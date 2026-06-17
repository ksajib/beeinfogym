<?php

namespace App\Http\Controllers;

use App\Models\AccountDeleteRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class DeletionController extends Controller
{
    public function index()
    {
        return view("pages.deletion");
    }

    public function deleteAccount(Request $request)
    {
        try {

            $validated = $request->validate([
                'uid'    => 'required|string|max:100',
                'email'  => 'required|email|max:255',
                'mobile' => ['required', 'regex:/^01[3-9][0-9]{8}$/'],
                'reason' => 'nullable|string|max:500',
            ]);

            // Check for existing pending request
            $pendingRequest = AccountDeleteRequest::where('uid', $validated['uid'])
                ->where('status', 'pending')
                ->exists();

            if ($pendingRequest) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'You already have a pending account deletion request.');
            }

            AccountDeleteRequest::create([
                'uid'    => $validated['uid'],
                'email'  => $validated['email'],
                'mobile' => $validated['mobile'],
                'reason' => $validated['reason'] ?? null,
                'status' => 'pending',
            ]);

            return redirect()->back()->with(
                'success',
                'Your account deletion request has been submitted successfully. Our team will review it shortly.'
            );
        } catch (ValidationException $e) {

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Throwable $e) {

            Log::error('Delete Account Error', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
                'file'    => $e->getFile(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
