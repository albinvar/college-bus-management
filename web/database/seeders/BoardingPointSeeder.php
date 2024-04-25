<?php

namespace Database\Seeders;

use App\Models\BoardingPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardingPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the boarding points
        $boardingPoints = [
            'Kumaranelloor',
            'Pathnadu',
            'Karukachal',
            'Kurichy',
            'Kottayam',
            'Changanassery',
            'Thiruvalla',
            'Kozhencherry',
            'Ranni',
        ];

        foreach ($boardingPoints as $boardingPoint) {
            BoardingPoint::create([
                'place' => $boardingPoint,
                'distance_from_college' => rand(1, 100),
            ]);
        }
    }
}
