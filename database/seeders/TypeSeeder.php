<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Historical Sites',
            'Natural Parks',
            'Beaches',
            'Cities',
            'Mountains',
            'Villages',
            'Adventures',
            'Wellness'
        ];

        foreach ($types as $typeName) {
            Type::create(['name' => $typeName]);
        }
    }
}
