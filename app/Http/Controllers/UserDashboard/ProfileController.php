<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view("pages.UserDashboard.index");
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
}