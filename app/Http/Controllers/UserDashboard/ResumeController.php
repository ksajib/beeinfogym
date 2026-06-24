<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function download($id)
    {
        $user = User::with(['profile', 'educations', 'trainings', 'experiences', 'achievements'])->findOrFail($id);

        $pdf = PDF::loadView('resume.pdf2', compact('user'));

        return $pdf->download($user->name . '_resume.pdf');
    }
}