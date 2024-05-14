<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $new_train = new Train();
            $new_train->slug = $faker->slug();
            $new_train->company = $faker->name();
            $new_train->departure_station = $faker->words(3, true);
            $new_train->arrival_station = $faker->words(3, true);
            $new_train->departure_time = $faker->time();
            $new_train->arrival_time = $faker->time();
            $new_train->train_code = $faker->numberBetween(100000000000, 999999999999);
            $new_train->carriages_number = $faker->randomDigit();

            $new_train->save();
        }
    }
}
