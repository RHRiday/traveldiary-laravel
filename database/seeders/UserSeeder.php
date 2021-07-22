<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rifat Hossen Riday',
            'email' => 'rifat@gmail.com',
            'password' => Hash::make('012345'),
            'username' => 'rhriday',
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Rifat Hossen Riday',
            'email' => 'rifat1@gmail.com',
            'password' => Hash::make('012345'),
            'username' => 'rifathr',
        ]);
    }
}
