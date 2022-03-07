<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['name' => 'indonesia',],
            ['name' => 'uk',],
            ['name' => 'us',],
        ];

        Location::insert($locations);

    }
}
