<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['first_name' => 'Иван', 'last_name' => 'Иванов', 'birth_date' => '2010-05-10', 'class_id' => 1],
            ['first_name' => 'Иван', 'last_name' => 'Иванов', 'birth_date' => '2010-08-15', 'class_id' => 1],
            ['first_name' => 'Мария', 'last_name' => 'Сидорова', 'birth_date' => '2011-03-22', 'class_id' => 2],
            ['first_name' => 'Алексей', 'last_name' => 'Петров', 'birth_date' => '2009-11-12', 'class_id' => 3],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
