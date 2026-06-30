<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::get();

        return view("pages.AdminDashboard.skill", compact("skills"));
    }

    public function store(Request $req)
    {
        try {

            $req->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'is_active' => 'nullable|boolean'
            ]);

            // ✔ Check only by name
            $skill = Skill::firstOrCreate(
                ['name' => $req->name],
                [
                    'description' => $req->description,
                    'is_active' => $req->is_active ?? 1
                ]
            );

            if ($skill->wasRecentlyCreated) {
                return redirect()->back()->with([
                    'toast' => [
                        'type' => 'success',
                        'message' => 'Skill created successfully!'
                    ]
                ]);
            }

            return redirect()->back()->with([
                'toast' => [
                    'type' => 'info',
                    'message' => 'Skill already exists!'
                ]
            ]);
        } catch (\Throwable $th) {

            return redirect()->back()->with([
                'toast' => [
                    'type' => 'error',
                    'message' => 'Something went wrong: ' . $th->getMessage()
                ]
            ]);
        }
    }
}
