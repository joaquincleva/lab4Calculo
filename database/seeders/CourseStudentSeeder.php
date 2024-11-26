<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $studentIds = \App\Models\Student::pluck('id')->toArray();
        $courseIds = \App\Models\Course::pluck('id')->toArray();
        $commissionIds = \App\Models\Commission::pluck('id')->toArray();

        if (empty($commissionIds)) {
            $this->command->error('Se necesitan registros en la tabla "commissions" para poblar "course_students".');
            return;
        }

        for ($i = 0; $i < 100; $i++) {
            DB::table('course_students')->insert([
                'student_id' => $faker->randomElement($studentIds),
                'course_id' => $faker->randomElement($courseIds),
                'commission_id' => $faker->randomElement($commissionIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
