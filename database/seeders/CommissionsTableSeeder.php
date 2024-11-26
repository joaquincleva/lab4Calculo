<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Professor;


class CommissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $courseIds = Course::pluck('id')->toArray();
        $professorIds = Professor::pluck('id')->toArray();

        if (empty($courseIds) || empty($professorIds)) {
            $this->command->error('Se necesitan registros en las tablas "courses" y "professors" para poblar "commissions".');
            return;
        }

        for ($i = 0; $i < 50; $i++) {
            DB::table('commissions')->insert([
                'aula' => 'Aula ' . $faker->numberBetween(1, 100),
                'horario' => $faker->time('H:i') . ' - ' . $faker->time('H:i'),
                'course_id' => $faker->randomElement($courseIds),
                'professor_id' => $faker->randomElement($professorIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
