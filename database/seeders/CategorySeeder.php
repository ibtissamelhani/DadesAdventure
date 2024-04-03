<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Wellness',
            'Wildlife',
            'Spirituality',
            'Cuisine',
            'Culture',
            'Adventure',
            'Exploration',
            'Exploration',
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }
    }
}
