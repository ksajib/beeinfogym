<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function download($id, Request $request)
    {
        $user = User::with(['profile', 'educations', 'trainings', 'experiences', 'achievements'])->findOrFail($id);

        $template = $request->template ?? 'template1';

        if ($template === 'template2') {
            $pdf = PDF::loadView('resume.pdf2', compact('user'));
        } else {
            $pdf = PDF::loadView('resume.pdf', compact('user'));
        }

        return $pdf->download($user->name . '_resume.pdf');
    }

    public function profilePreference()
    {
        return view('pages.UserDashboard.profilePreference');
    }
}
