<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacePicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place_pics')->insert([
            'place_id' => 1,
            'path' => '/resources/places/Nafakhum.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 2,
            'path' => '/resources/places/Cottage.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 3,
            'path' => '/resources/places/Tahirpur.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 4,
            'path' => '/resources/places/Shajek.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 5,
            'path' => '/resources/places/Peyara.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 6,
            'path' => '/resources/places/Kutubdiya.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 7,
            'path' => '/resources/places/Kamalganj.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 8,
            'path' => '/resources/places/Gowainghat.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 9,
            'path' => '/resources/places/Zinda.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 10,
            'path' => '/resources/places/Nilgiri.jpg',
        ]);
    }
}
