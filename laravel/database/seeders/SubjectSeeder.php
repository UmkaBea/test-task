<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = ['Математика', 'Физика', 'Химия', 'Литература', 'История'];

        foreach ($subjects as $subject) {
            Subject::create(['name' => $subject]);
        }
    }
}
