<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach(range(1, 4) as $id)
        {
            $company = Company::create([
                'name' => $faker->unique()->company,
                'logo' => $faker->image('public/storage/images/companies',400,300, null, false) 
                ]);

            
        }

    }
}
