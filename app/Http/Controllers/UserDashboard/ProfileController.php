<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;

        $user = User::with(['profile', 'educations', 'trainings', 'experiences', 'achievements'])->findOrFail($user_id);

        $score = 0;

        if ($user->profile && !empty($user->profile->profile_photo)) {
            $score += 5;
        }

        $fields = [
            'first_name',
            'last_name',
            'fathers_name',
            'mothers_name',
            'dob',
            'gender',
            'religion',
            'marital_status',
            'nationality',
            'nid',
            'passport_no',
            'passport_issue_date',
            'primary_mobile',
            'secondary_mobile',
            'email',
            'alternate_email',
            'bio',
            'address',
        ];

        $filled = 0;
        $total = count($fields);

        foreach ($fields as $field) {
            if (!empty($user->profile->$field)) {
                $filled++;
            }
        }

        $score = $score + round(($filled / $total) * 30);

        if (count($user->educations) >= 1) {
            $score += 10;
        }

        if (count($user->trainings) >= 1) {
            $score += 20;
        }

        if (count($user->experiences) >= 1) {
            $score += 20;
        }

        if (count($user->achievements) >= 1) {
            $score += 15;
        }

        return view("pages.UserDashboard.index",  compact("user", 'score'));
    }



    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $user = auth()->user();

        $file = $request->file('profile_image');

        $fileName = $file->hashName();
        $file->storeAs('avatars', $fileName, 'public');



        // Create or update profile safely
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            ['profile_photo' => $fileName]
        );

        return response()->json([
            'success' => true,
            'image_url' => asset('storage/avatars/' . $fileName)
        ]);
    }

    public function editProfile(Request $req)
    {
        try {

            DB::transaction(function () use ($req) {

                $userId = auth()->id();

                $profile = Profile::updateOrCreate(
                    ['user_id' => $userId],
                    [
                        'first_name' => $req->first_name,
                        'last_name' => $req->last_name,
                        'fathers_name' => $req->fathers_name,
                        'mothers_name' => $req->mothers_name,
                        'dob' => $req->dob,
                        'gender' => $req->gender,
                        'religion' => $req->religion,
                        'marital_status' => $req->marital_status,
                        'nationality' => $req->nationality,
                        'nid' => $req->nid,
                        'passport_no' => $req->passport_no,
                        'passport_issue_date' => $req->passport_issue_date,
                        'secondary_mobile' => $req->secondary_mobile,
                        'alternate_email' => $req->alternate_email,
                        'bio' => $req->bio,
                        'address' => $req->address,
                    ]
                );
            });

            return back()->with('success', 'Profile updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function saveAllEducation(Request $req)
    {
        $req->validate([
            'education' => 'required|array|min:1',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
        ]);

        try {

            DB::transaction(function () use ($req) {

                $userId = auth()->id();

                $educationRecords = array_values(
                    $req->input('education', [])
                );

                $ids = collect($educationRecords)
                    ->pluck('id')
                    ->filter()
                    ->toArray();

                // delete removed records
                Education::where('user_id', $userId)
                    ->whereNotIn('id', $ids)
                    ->delete();

                // save/update education
                foreach ($educationRecords as $record) {

                    Education::updateOrCreate(
                        [
                            'id' => $record['id'] ?? null,
                            'user_id' => $userId,
                        ],
                        [
                            'institution' => $record['institution'],
                            'degree' => $record['degree'],
                            'field' => $record['field'] ?? null,
                            'result' => $record['result'] ?? null,
                            'grade_system' => $record['grade_system'] ?? null,
                            'start_date' => $record['start_date'] ?: null,
                            'end_date' => !empty($record['is_current'])
                                ? null
                                : ($record['end_date'] ?: null),
                            'is_current' => !empty($record['is_current']),
                            'description' => $record['description'] ?? null,
                        ]
                    );
                }
            });

            return back()->with('success', 'Education information saved successfully.');
        } catch (\Throwable $e) {

            Log::error($e->getMessage());

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function saveAllTraining(Request $request)
    {
        $request->validate([
            'training' => 'required|array|min:1',
            'training.*.id' => 'nullable|integer',
            'training.*.training_title' => 'required|string|max:255',
            'training.*.topic' => 'nullable|string|max:255',
            'training.*.institution_name' => 'nullable|string|max:255',
            'training.*.duration' => 'nullable|string|max:255',
            'training.*.duration_type' => 'nullable|string|max:50',
            'training.*.location' => 'nullable|string|max:255',
            'training.*.description' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $userId = auth()->id();

            $records = array_values($request->training);

            foreach ($records as $row) {
                Training::updateOrCreate(
                    [
                        'id' => $row['id'] ?? null,
                        'user_id' => $userId,
                    ],
                    [
                        'user_id' => $userId,
                        'training_title' => $row['training_title'],
                        'topic' => $row['topic'] ?? null,
                        'institution_name' => $row['institution_name'] ?? null,
                        'duration' => $row['duration'] ?? null,
                        'duration_type' => $row['duration_type'] ?? null,
                        'location' => $row['location'] ?? null,
                        'description' => $row['description'] ?? null,
                    ]
                );
            }

            DB::commit();

            return back()->with('success', 'Training saved successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function saveAllExperience(Request $req)
    {
        try {

            $validated = $req->validate([
                'experience' => 'required|array',

                'experience.*.job_title' => 'required|string|max:255',
                'experience.*.company_name' => 'required|string|max:255',
                'experience.*.employment_type' => 'nullable|string|max:50',
                'experience.*.location' => 'nullable|string|max:255',
                'experience.*.start_date' => 'nullable|date',
                'experience.*.end_date' => 'nullable|date',
                'experience.*.is_current' => 'nullable',
                'experience.*.description' => 'nullable|string',
            ]);

            $userId = Auth::id();

            foreach ($validated['experience'] as $exp) {

                if (empty($exp['job_title']) || empty($exp['company_name'])) {
                    continue;
                }

                Experience::updateOrCreate(
                    [
                        'id' => $exp['id'] ?? null,
                        'user_id' => $userId,
                    ],
                    [
                        'user_id' => $userId,
                        'job_title' => $exp['job_title'],
                        'company_name' => $exp['company_name'],
                        'employment_type' => $exp['employment_type'] ?? 'Full-time',
                        'location' => $exp['location'] ?? null,
                        'start_date' => $exp['start_date'] ?? null,
                        'end_date' => !empty($exp['is_current'])
                            ? null
                            : ($exp['end_date'] ?? null),

                        // FIXED BOOLEAN ISSUE
                        'is_current' => !empty($exp['is_current']),

                        'description' => $exp['description'] ?? null,
                    ]
                );
            }

            return back()->with('success', 'Experience saved successfully.');
        } catch (\Throwable $e) {

            Log::error('Experience Save Error', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function saveAllAchievement(Request $request)
    {
        try {

            $validated = $request->validate([
                'achievement' => 'required|array',

                'achievement.*.title' => 'required|string|max:255',
                'achievement.*.issuer' => 'nullable|string|max:255',
                'achievement.*.date' => 'nullable|date',
                'achievement.*.description' => 'nullable|string',
            ]);

            $userId = Auth::id();

            foreach ($validated['achievement'] as $item) {

                if (empty($item['title'])) {
                    continue;
                }

                Achievement::updateOrCreate(
                    [
                        'id' => $item['id'] ?? null,
                        'user_id' => $userId,
                    ],
                    [
                        'user_id' => $userId,
                        'title' => $item['title'],
                        'issuer' => $item['issuer'] ?? null,
                        'date' => $item['date'] ?? null,
                        'description' => $item['description'] ?? null,
                    ]
                );
            }

            return back()->with('success', 'Achievements saved successfully.');
        } catch (\Throwable $e) {

            Log::error('Achievement Save Error', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}