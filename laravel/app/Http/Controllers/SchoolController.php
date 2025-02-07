<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Http\Requests\CreateClassRequest;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\CreateSubjectRequest;
use App\Http\Resources\StudentResource;
use App\Http\Resources\SchoolClassResource;
use App\Http\Resources\SubjectResource;

class SchoolController extends Controller
{
    public function getClasses()
    {
        return SchoolClassResource::collection(SchoolClass::all());
    }

    public function getStudents()
    {
        return StudentResource::collection(Student::with('class')->get());
    }

    public function getStudentsByClass($classId)
    {
        $students = Student::where('class_id', $classId)->with('class')->get();
        return StudentResource::collection($students);
    }

    public function createSubject(CreateSubjectRequest $request) 
    {
        $subject = Subject::create(['name' => $request->name]);
        return new SubjectResource($subject, 201);
    }

    public function createClass(CreateClassRequest $request) 
    {
        $class = SchoolClass::create(['name' => $request->name]);
        return new SchoolClassResource($class, 201);
    }

    public function createStudent(CreateStudentRequest $request)
    {
        $student = Student::create($request->all());
        return new StudentResource($student, 201);
    }


}
