<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function getScheduleForClass($classId)
    {
        $schedule = Schedule::where('class_id', $classId)->with(['class', 'subject', 'teacher'])->get();
        return ScheduleResource::collection($schedule);
    }

    public function createSchedule(CreateScheduleRequest $request)
    {
        $schedule = Schedule::create($request->validated());
        return new ScheduleResource($schedule);
    }
}
