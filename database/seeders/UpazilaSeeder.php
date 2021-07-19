<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('upazilas')->insert([
            'division' => 'Chattogram',
            'district' => 'Chattogram',
            'upazila' => 'Chattogram',
        ]);
        DB::table('upazilas')->insert([
            'division' => 'Chattogram',
            'district' => 'Chattogram',
            'upazila' => 'Sitakunda',
        ]);
    }
}
