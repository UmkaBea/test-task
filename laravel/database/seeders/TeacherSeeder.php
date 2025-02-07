<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['name' => 'Анна', 'surname' => 'Смирнова', 'email' => 'anna@example.com', 'password' => Hash::make('password')],
            ['name' => 'Борис', 'surname' => 'Иванов', 'email' => 'boris@example.com', 'password' => Hash::make('password')],
            ['name' => 'Виктор', 'surname' => 'Кузнецов', 'email' => 'victor@example.com', 'password' => Hash::make('password')],
        ];

        foreach ($teachers as $teacher) {
            User::create(array_merge($teacher, ['phone' => null, 'subject' => null]));
        }
    }
}
