<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen( env('APP_URL').'/csvs/houses.csv' , 'r');

        while(($row = fgetcsv($file , 0 , ','))  != false){
            DB::table('houses')->insert(
                array(
                    'name' => $row[0],
                    'price' => $row[1],
                    'bedrooms' => $row[2],
                    'bathrooms' => $row[3],
                    'storeys' => $row[4],
                    'garages' => $row[5],
                )
            );
        };
    }
}
