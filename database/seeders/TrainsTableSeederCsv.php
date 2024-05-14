<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;

class TrainsTableSeederCsv extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = fopen(__DIR__ . '/trains.csv', 'r');
        $i = 0;

        while (($row = fgetcsv($data)) !== false) {
            if ($i > 0) {
                $new_train = new Train();
                $new_train->company = $row[0];
                $new_train->departure_station = $row[1];
                $new_train->arrival_station = $row[2];
                $new_train->departure_time = $row[3];
                $new_train->arrival_time = $row[4];
                $new_train->train_code = $row[5];
                $new_train->wagons_number = $row[6];
                $new_train->on_time = $row[7];
                $new_train->cancelled = $row[8];
                $new_train->slug = $this->generateSlug($new_train->company, $new_train->train_code);

                $new_train->save();
            }
            $i++;
        }
        fclose($data);
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
