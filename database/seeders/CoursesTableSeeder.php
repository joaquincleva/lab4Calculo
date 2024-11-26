<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder
{
public function run()
{
    /*
DB::table('courses')->insert([
['name' => 'Physics 101', 'subject_id' => 2],
['name' => 'Chemistry 101', 'subject_id' => 3],
]);
}*/

    $faker = Faker::create();
    
    $subjectIds = DB::table('subjects')->pluck('id');
            foreach (range(1, 20) as $index) {
            DB::table('courses')->insert([
            'name' => $faker->word . ' ' . $faker->randomNumber(3),
            'subject_id' => $faker->randomElement($subjectIds),
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
            ]);
            }
        }


}
