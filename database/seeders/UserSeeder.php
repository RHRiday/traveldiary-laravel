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
            'name' => 'Dokko Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('012345'),
            'username' => 'dokkoadmin',
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Rifat Hossen Riday',
            'email' => 'rifat@gmail.com',
            'password' => Hash::make('012345'),
            'username' => 'rhriday',
            'dp' => 'rhriday.jpg',
            'cover' => 'rhriday.jpg',
        ]);
        DB::table('users')->insert([
            'name' => 'Shajjadul Kabir',
            'email' => 'abir@gmail.com',
            'password' => Hash::make('012345'),
            'username' => 'shajjad71',
            'dp' => 'shajjad71.jpg',
            'cover' => 'shajjad71.jpg',
        ]);
        DB::table('users')->insert([
            'name' => 'Sajjad Hossen Noyon',
            'email' => 'noyon@gmail.com',
            'password' => Hash::make('012345'),
            'username' => 'noyon31',
            'dp' => 'noyon31.jpg',
            'cover' => 'noyon31.jpg',
        ]);
    }
}
