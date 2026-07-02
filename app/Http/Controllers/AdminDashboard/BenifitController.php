<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class BenifitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::get();
        return view("pages.AdminDashboard.benifit", compact('benefits'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            Benefit::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 1,
            ]);

            Toastr::success('Benefit added successfully!', 'Success');
        } catch (\Throwable $th) {

            Toastr::error('Something went wrong!', 'Error');

            // Optional: log error
            \Log::error($th->getMessage());
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $benefit = Benefit::findOrFail($id);
            $benefit->delete();

            Toastr::success('Benefit deleted successfully!', 'Success');
        } catch (\Throwable $th) {

            Toastr::error('Something went wrong!', 'Error');

            // Optional: log error
            \Log::error($th->getMessage());
        }

        return redirect()->back();
    }
}
