<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Education;
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

        return view("pages.UserDashboard.index", compact('profile'));
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
}
