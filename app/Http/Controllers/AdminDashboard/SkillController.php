<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Brian2694\Toastr\Facades\Toastr;
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
                Toastr::success('Skill created successfully!', 'Success');
                return redirect()->back();
            }
            Toastr::info('Skill already exists!', 'Info');
        } catch (\Throwable $th) {
            Toastr::error('Something went wrong!', 'Error');

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();

            Toastr::success('Skill deleted successfully!', 'Success');

            return redirect()->back();
        } catch (\Throwable $th) {
            Toastr::error('Something went wrong!', 'Error');

            return redirect()->back();
        }
    }
}