<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagePicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package_pics')->insert([
            'package_id' => 1,
            'path' => 'Belaichhari.jpg',
        ]);
        DB::table('package_pics')->insert([
            'package_id' => 1,
            'path' => 'Belaichhari162764038385.jpg',
        ]);
        DB::table('package_pics')->insert([
            'package_id' => 2,
            'path' => 'Chandronath162764038385.jpg',
        ]);
        DB::table('package_pics')->insert([
            'package_id' => 3,
            'path' => 'Thanchi16755463135.jpg',
        ]);
        DB::table('package_pics')->insert([
            'package_id' => 4,
            'path' => 'Sundarbans199853354756.jpg',
        ]);
    }
}
