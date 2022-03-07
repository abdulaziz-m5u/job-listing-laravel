<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'fullstack',],
            ['name' => 'backend',],
            ['name' => 'frontend',],
        ];

        Category::insert($categories);

    }
}
