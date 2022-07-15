<?php

namespace App\Http\Controllers;

use App\Models\NewStudent;
use Illuminate\Http\Request;

class NewStudentController extends Controller
{
    public function index()
    {
        $newStudents = NewStudent::orderBy('id', 'DESC')->get();
        return view('newStudents', compact('newStudents'));
    }

    public function addStudent(Request $request)
    {
        $newStudent = new NewStudent();
        $newStudent->firstname = $request->firstname;
        $newStudent->lastname = $request->lastname;
        $newStudent->email = $request->email;
        $newStudent->phone = $request->phone;
        $newStudent->save();
        return response()->json($student);
    }

    public function getStudentById($id)
    {
        $newStudent = NewStudent::find($id);
        return response()->json($newStudent);
    }

    public function updateStudent(Request $request)
    {
        $newStudent = NewStudent::find($request->id);
        $newStudent->firstname = $request->firstname;
        $newStudent->lastname = $request->lastname;
        $newStudent->email = $request->email;
        $newStudent->phone = $request->phone;
        $newStudent->save();
        return response()->json($newStudent);
    }
}
