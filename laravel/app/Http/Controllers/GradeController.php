<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{

    public function giveGrade(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'grade' => 'required|integer|min:1|max:5',
            'date' => 'required|date',
        ]);

        if (Auth::user()->role !== 'teacher') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $grade = Grade::create([
            'student_id' => $request->student_id,
            'teacher_id' => Auth::id(),
            'subject_id' => $request->subject_id,
            'grade' => $request->grade,
            'date' => $request->date,
        ]);

        return response()->json(['message' => 'Grade added', 'grade' => $grade], 201);
    }

    public function studentGrades()
    {
        if (Auth::user()->role !== 'student') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $student = Student::where('email', Auth::user()->email)->first();

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student->grades);
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'grade' => 'required|integer|min:1|max:5',
        ]);

        if (Auth::user()->role !== 'teacher') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $grade->update(['grade' => $request->grade]);

        return response()->json(['message' => 'Grade updated', 'grade' => $grade]);
    }
}
