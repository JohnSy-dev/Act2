<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();

        return view('studentLists', compact('students'));
    }

    public function newStudent(Request $request)
    {
        $request->validate([
            'stdName' => 'required|max:100',
            'stdAge' => 'required|integer',
            'stdGender' => 'nullable',
        ]);

        $input['name'] = $request->stdName;
        $input['age'] = $request->stdAge;
        $input['gender'] = $request->stdGender;
        Students::create($input);

        return redirect()->route('std.index')->with('success', 'Student created successfully.');
    }

    public function edit($id) {
        $student = Students::find($id);
        return view('edit_student', compact('student'));

    }
    public function update(Request $request, $id) {
        $student = Students::find($id);
        if ($student) {
            $student->update([
                'name' => $request->stdName,
                'age' => $request->stdAge,
                'gender' => $request->stdGender,
            ]);
            return redirect()->route('std.index')->with('success', 'Student updated successfully.');
        }
        return redirect()->back()->with('error', 'Student not found.');

    }
    public function destroy($id)
    {
        $student = Students::find($id);

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        $student->delete();
        return redirect()->route('std.index')->with('success', 'Student deleted successfully.');
    }
}