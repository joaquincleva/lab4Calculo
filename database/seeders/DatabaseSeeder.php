<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SubjectsTableSeeder::class,
            CoursesTableSeeder::class,
            ProfessorsTableSeeder::class,
            StudentsTableSeeder::class,
            CommissionsTableSeeder::class,
            CourseStudentSeeder::class,
        ]);
    }
}
