<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buses = [
[
                'name' => 'Chanaganassery Bus',
                'number_plate' => 'KL 01 1234',
                'capacity' => 50,
                'bus_no' => '1',
                'description' => 'This is a bus',
                'destination' => 'Kumaranelloor',
            ],
            [
                'name' => 'Manimala Bus',
                'number_plate' => 'KL 01 1235',
                'capacity' => 50,
                'bus_no' => '2',
                'description' => 'This is a bus',
                'destination' => 'Pathnadu',
            ],
            [
                'name' => 'Karukachal Bus',
                'number_plate' => 'KL 01 1236',
                'capacity' => 50,
                'bus_no' => '3',
                'description' => 'This is a bus',
                'destination' => 'Karukachal',
            ],
            [
                'name' => 'Kozhencherry Bus',
                'number_plate' => 'KL 01 1237',
                'capacity' => 50,
                'bus_no' => '4',
                'description' => 'This is a bus',
                'destination' => 'Kurichy',
            ],
            [
                'name' => 'Kottayam Bus',
                'number_plate' => 'KL 01 1238',
                'capacity' => 50,
                'bus_no' => '5',
                'description' => 'This is a bus',
                'destination' => 'Kottayam',
            ],
        ];

        foreach ($buses as $bus) {
            Bus::create($bus);
        }

        // associate the buses with boarding points
        $busBoardingPoints = [
            [
                'bus_id' => 1,
                'boarding_point_id' => Bus::where('destination', 'Kumaranelloor')->first()->id,
                'morning_reach_time' => '08:00',
                'evening_reach_time' => '16:00',
            ],
            [
                'bus_id' => 1,
                'boarding_point_id' => Bus::where('destination', 'Kottayam')->first()->id,
                'morning_reach_time' => '08:00',
                'evening_reach_time' => '16:00',
            ],
            [
                'bus_id' => 2,
                'boarding_point_id' => Bus::where('destination', 'Pathnadu')->first()->id,
                'morning_reach_time' => '08:00',
                'evening_reach_time' => '16:00',
            ],
            [
                'bus_id' => 3,
                'boarding_point_id' => Bus::where('destination', 'Karukachal')->first()->id,
                'morning_reach_time' => '08:00',
                'evening_reach_time' => '16:00',
            ],
            [
                'bus_id' => 4,
                'boarding_point_id' => Bus::where('destination', 'Kumaranelloor')->first()->id,
                'morning_reach_time' => '08:00',
                'evening_reach_time' => '16:00',
            ],
        ];

        foreach ($busBoardingPoints as $busBoardingPoint) {
            \App\Models\BusBoardingPoint::create($busBoardingPoint);
        }

    }
}
