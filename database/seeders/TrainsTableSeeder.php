<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $new_train = new Train();
            $new_train->company = $faker->name();
            $new_train->departure_station = $faker->city();
            $new_train->arrival_station = $faker->city();
            $new_train->departure_time = $faker->time();
            $new_train->arrival_time = $faker->time();
            $new_train->train_code = $faker->numberBetween(100000000000, 999999999999);
            $new_train->wagons_number = $faker->randomDigit();
            $new_train->slug = $this->generateSlug($new_train->company, $new_train->train_code);

            $new_train->save();
        }
    }
    private function generateSlug($string, $code)
    {
        $slug = Str::slug($string . '-' . $code, '-');
        $original_slug = $slug;

        $exists = Train::find($slug);
        $c = 1;

        while ($exists) {
            $slug = $original_slug . '-' . $c;
            $exists = Train::find($slug);
            $c++;
        }
        return $slug;
    }
}
