<?php

namespace App\Http\Controllers\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{

    public function index(Request $request)
    {
        $student = Auth::user();
        $purchased = Purchase::with(['course', 'user'])
            ->where('user_id', $student->id)
            ->get();
    
        return view('admin.student.profile.index', compact('student', 'purchased'));
    }
    


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
