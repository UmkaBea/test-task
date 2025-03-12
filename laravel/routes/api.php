<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ScheduleController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('teacher')->group(function () {
    Route::get('/classes', [SchoolController::class, 'getClasses']);
    Route::get('/students', [SchoolController::class, 'getStudents']);
    Route::get('/students/{classId}', [SchoolController::class, 'getStudentsByClass']);
    Route::get('/schedules/{classId}', [ScheduleController::class, 'getScheduleForClass']);

    Route::post('/subjects', [SchoolController::class, 'createSubject']);
    Route::post('/classes', [SchoolController::class, 'createClass']);
    Route::post('/students', [SchoolController::class, 'createStudent']);
    Route::post('/schedules', [ScheduleController::class, 'createSchedule']);

    Route::post('/grades', [GradeController::class, 'giveGrade']); 
    Route::patch('/grades/{grade}', [GradeController::class, 'update']);
});

Route::middleware('student')->group(function () {
    Route::get('/schedule', [ScheduleController::class, 'getScheduleForClass']);
    Route::get('/grades', [GradeController::class, 'studentGrades']);
});


  
    


