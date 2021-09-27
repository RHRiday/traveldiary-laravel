<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UpazilaSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PlacesSeeder;
use Database\Seeders\PackageSeeder;



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
            PlacesSeeder::class,
            PlacePicsSeeder::class,
            PackageSeeder::class,
            PackagePicsSeeder::class,
        ]);
    }
}
