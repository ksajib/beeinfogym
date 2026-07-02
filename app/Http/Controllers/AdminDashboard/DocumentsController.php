<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Documemt;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = Documemt::get();
        return view("pages.AdminDashboard.documents", compact('documents'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'is_active' => 'required|boolean',
            ]);

            Documemt::create([
                'name' => $request->name,
                'is_active' => $request->is_active,
            ]);

            Toastr::success('Required Document added successfully.', 'Success');

            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error('Required Document creation failed: ' . $th->getMessage());

            Toastr::error('Something went wrong while adding the Required Document.', 'Error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $document = Documemt::findOrFail($id);
            $document->delete();

            Toastr::success('Required Document deleted successfully.', 'Success');
        } catch (\Throwable $th) {
            Log::error('Required Document deletion failed: ' . $th->getMessage());

            Toastr::error('Something went wrong while deleting the Required Document.', 'Error');
        }

        return redirect()->back();
    }
}