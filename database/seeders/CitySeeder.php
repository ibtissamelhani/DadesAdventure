<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Agadir',
            'Casablanca',
            'Fez',
            'Marrakech',
            'Rabat',
            'Tangier',
            'Essaouira',
            'Ouarzazate',
            'Chefchaouen',
            'Tetouan',
        ];

        foreach ($cities as $cityName) {
            City::create(['name' => $cityName]);
        }
    }
}
