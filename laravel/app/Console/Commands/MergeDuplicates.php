<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;

class MergeDuplicates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:merge-duplicates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'deletes duplicates of students';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $students = Student::select('first_name', 'last_name', 'class_id')
            ->groupBy('first_name', 'last_name', 'class_id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        foreach ($students as $student) {
            $this->removeDuplicates($student->first_name, $student->last_name, $student->class_id);
        }
    
    }

    private function removeDuplicates($firstName) 
    {
        $duplicates = Student::where([
            ['first_name', $firstName],
            ['last_name', $lastName],
            ['class_id', $classId]
        ])->get();

        $mainStudent = $duplicates->shift();

        foreach ($duplicates as $duplicate) {
            $duplicate->delete();
            $this->info("Duplicate deleted: {$duplicate->first_name} {$duplicate->last_name} (Class ID: {$duplicate->class_id})");
        }
    }
}
