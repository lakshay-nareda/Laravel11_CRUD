<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentAddedMail;

use Illuminate\Http\Request;
use App\Models\Stu;

class StuController extends Controller
{
    // Display a listing of students
    public function index()
    {
        $students = Stu::all();
        return view('students', compact('students'));
    }

    // Store a newly created student in the database
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'stu_name' => 'required|string|max:255',
        //     'stu_email' => 'required|email|unique:stu,stu_email',
        //     'stu_contact' => 'required|string|max:15',
        // ]);

        // // Stu::create($validatedData);


        $validate_rule = [
            'stu_name' => 'required|string|max:255',
            'stu_email' => 'required|email|unique:stu,stu_email',
            'stu_contact' => 'required|string|max:10',
        ];
        $validate_msg = [
            'stu_name.required' => 'Name is Required!!',
            'stu_email.required' => 'Email is Required!!',
            'stu_email.unique' => 'This E-mail is alreday entered!!',
            'stu_contact.required' => 'Contact is Required!!',
        ];

        $request->validate(
            $validate_rule,
            $validate_msg,
        );

        $stu_info = new Stu();
        $stu_info->stu_name = $request->stu_name;
        $stu_info->stu_email = $request->stu_email;
        $stu_info->stu_contact = $request->stu_contact;

        $stu_info->save();

        Mail::to($stu_info->stu_email)->send(new StudentAddedMail($stu_info));

        return redirect()->back()->with('success', 'Student added successfully!');
    }

    // Show the form for editing the specified student
    public function edit($id)
    {
        $student = Stu::find($id);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found!');
        }

        return view('edit_student', compact('student'));
    }

    // Update the specified student in the database
    public function update(Request $request, $id)
    {
        $student = Stu::find($id);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found!');
        }

        // $validatedData = $request->validate([
        //     'stu_name' => 'required|string|max:255',
        //     'stu_email' => 'required|email|unique:stu,stu_email,' . $id,
        //     'stu_contact' => 'required|string|max:15',
        // ]);


        // // $student->update($validatedData);

        $student->stu_name = $request->stu_name;
        $student->stu_email = $request->stu_email;
        $student->stu_contact = $request->stu_contact;

        $student->update();


        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    // Remove the specified student from the database
    public function destroy($id)
    {
        $student = Stu::find($id);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found!');
        }

        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully!');
    }
}
