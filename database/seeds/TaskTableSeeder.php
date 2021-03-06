<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 876;
        
        for ($i = 0; $i < $limit; $i++) {
            DB::table('tasks')->insert([
                'name' => $faker->sentence(),
                'created_at' => $faker->dateTimeBetween($startDate = '-15 years', $endDate = 'now'),
                'updated_at' => new DateTime(),
                'revision_status' => $faker->boolean($chanceOfGettingTrue = 50),
            ]);
        }
    }
}
