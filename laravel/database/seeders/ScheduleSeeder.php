<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedule = [
            ['class_id' => 1, 'subject_id' => 1, 'teacher_id' => 1, 'day_of_week' => 'Понедельник', 'start_time' => '09:00', 'end_time' => '09:45'],
            ['class_id' => 1, 'subject_id' => 2, 'teacher_id' => 2, 'day_of_week' => 'Понедельник', 'start_time' => '10:00', 'end_time' => '10:45'],
            ['class_id' => 2, 'subject_id' => 3, 'teacher_id' => 3, 'day_of_week' => 'Вторник', 'start_time' => '09:00', 'end_time' => '09:45'],
            ['class_id' => 3, 'subject_id' => 4, 'teacher_id' => 3, 'day_of_week' => 'Пятница', 'start_time' => '09:00', 'end_time' => '09:45'],
            ['class_id' => 5, 'subject_id' => 2, 'teacher_id' => 2, 'day_of_week' => 'Среда', 'start_time' => '09:00', 'end_time' => '09:45'],
            ['class_id' => 3, 'subject_id' => 1, 'teacher_id' => 2, 'day_of_week' => 'Четверг', 'start_time' => '09:00', 'end_time' => '09:45'],
        ];

        foreach ($schedule as $lesson) {
            Schedule::create($lesson);
        }
    }
}
