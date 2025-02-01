<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;

class SchoolController extends Controller
{
    public function getClasses()
    {
        return response()->json(SchoolClass::all());
    }

    public function getStudents()
    {
        return response()->json(Student::all());
    }

    public function getStudentsByClass($classId)
    {
        $students = Student::where('class_id', $classId)->with('class')->get();
        return response()->json($students);
    }

    public function createSubject(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|unique:subjects|max:255',
        ]);

        $subject = Subject::create(['name' => $request->name]);
        return response()->json($subject, 201);
    }

    public function createClass(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|unique:classes|max:255',
        ]);

        $class = SchoolClass::create(['name' => $request->name]);
        return response()->json($class, 201);
    }

    public function createStudent(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'class_id' => 'required|exists:classes,id',
        ]);

        $student = Student::create($request->all());
        return response()->json($student, 201);
    }


}
