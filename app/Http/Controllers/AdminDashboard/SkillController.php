<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = [
            [
                'gym_id' => 1,
                'member_id' => 41966,
                'title' => 'Cardio Training',
                'description' => 'Running and endurance exercise',
                'level' => 2,
                'is_active' => 1,
                'created_by' => 1,
            ],
            [
                'gym_id' => 1,
                'member_id' => 41966,
                'title' => 'Weight Lifting',
                'description' => 'Advanced weight lifting techniques',
                'level' => 3,
                'is_active' => 1,
                'created_by' => 1,
            ],
            [
                'gym_id' => 1,
                'member_id' => 41966,
                'title' => 'Yoga Training',
                'description' => 'Flexibility and balance training',
                'level' => 1,
                'is_active' => 1,
                'created_by' => 1,
            ],
        ];

        return view("pages.AdminDashboard.skill", compact("skills"));
    }
}