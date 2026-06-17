<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;

        $profile = DB::select("SELECT * FROM profiles WHERE user_id = ?", [$user_id]);
        $education = DB::select("SELECT * FROM educations WHERE user_id = ?", [$user_id]);

        return view("pages.UserDashboard.index",  compact('profile', 'education'));
    }

    public function uploadAvatar(Request $request)
    {
        // 1. Validate the file
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $user = auth()->user();
            $file = $request->file('profile_image');

            // Clean up the old file if it exists
            if ($user->profile_image) {
                Storage::disk('public')->delete('avatars/' . $user->profile_image);
            }

            // Store the file and get the unique generated name (e.g., "AbC123xyz.jpg")
            $fileName = $file->hashName();
            $file->storeAs('avatars', $fileName, 'public');

            // Save just the unique filename string to your existing column
            $user->update([
                'profile_image' => $fileName,
            ]);

            return response()->json([
                'success' => true,
                'image_url' => asset('storage/avatars/' . $fileName)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file was processed.'
        ], 400);
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

                Education::where('user_id', $userId)
                    ->whereNotIn('id', $ids)
                    ->delete();

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

            return back()->with(
                'success',
                'Education information saved successfully.'
            );
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
}
