<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UpazilaSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UpazilaSeeder::class,
            UserSeeder::class,
        ]);
    }
}
