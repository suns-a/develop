<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student3;

class StudentController extends Controller
{
    public function fetchStudents()
    {
        $students = Student::whereBetween('id', [33,44])->orderBy('id', 'DESC')->get();
        return $students;
    }

    public function addStudent()
    {
        $student = new Student3();
        $student->name = "Peter";
        $student->email = "PETERjohn@gmail.com";
        $student->phone = "1234567891";
        $student->save();
        return "Record Inserted";
    }

    public function getStudents()
    {
        return Student3::all();
    }

    public function storeStudent(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $student = new Student();
        $student->name = $name;
        $student->profileimage =  $imageName;
        $student->save();
        return back()->with('student_added', 'Student record has been inserted');
    }

    public function students()
    {
        $students = Student::all();
        return view('all-students', compact('students'));
    }

    public function editStudent($id)
    {
        $student = Student::find($id);
        return view('edit-student', compact('student'));
    }

    public function updateStudent(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $student = Student::find($request->id);
        $student->name = $name;
        $student->profileimage = $imageName;
        $student->save();
        return back()->with('student_updated', 'Student updated successfully!');
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        unlink(public_path('images').'/'.$student->profileimage);
        $student->delete();
        return back()->with('student_deleted', 'Student deleted successfully!');
    }
}
