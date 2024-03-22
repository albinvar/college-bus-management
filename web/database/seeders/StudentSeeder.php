<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Student::factory()->create([
            'email' => 'student1@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // use the factory to create 10 student
        \App\Models\Student::factory(10)->create();
    }
}
