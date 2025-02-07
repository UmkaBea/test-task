<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SchoolClass;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = ['1А', '2Б', '3В', '4Г', '5А'];

        foreach ($classes as $class) {
            SchoolClass::create(['name' => $class]);
        }
    }
}
