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
            'path' => 'Nafakhum.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 2,
            'path' => 'Cottage.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 3,
            'path' => 'Tahirpur.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 4,
            'path' => 'Shajek.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 5,
            'path' => 'Peyara.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 6,
            'path' => 'Kutubdiya.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 7,
            'path' => 'Kamalganj.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 8,
            'path' => 'Gowainghat.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 9,
            'path' => 'Zinda.jpg',
        ]);
        DB::table('place_pics')->insert([
            'place_id' => 10,
            'path' => 'Nilgiri.jpg',
        ]);
    }
}
