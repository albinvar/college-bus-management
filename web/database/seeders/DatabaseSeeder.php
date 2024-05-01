<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the roles and permissions
        $this->call(RolesAndPermissionsSeeder::class);

        // Seed the settings
        $this->call(SettingsSeeder::class);

        // Seed the boarding points
        $this->call(BoardingPointSeeder::class);

        // Seed the buses
        $this->call(BusSeeder::class);

        // Attach boarding points to buses
        $this->call(BusBoardingPointSeeder::class);

        // Seed the semesters
        \App\Models\Semester::factory(5)->create();

        // Seed the students
        $student = \App\Models\Student::factory()->create([
            'boarding_point' => 'Kumaranelloor',
            'drop_off_point' => 'Kumaranelloor',
             'user_id' => \App\Models\User::factory()->create([
                 'name' => 'Amithamol Varghese',
                 'email' => 'student1@gmail.com',
                 'password' => bcrypt('password'),
                ])->id,
         ]);

        // Seed the students
        $student2 = \App\Models\Student::factory()->create([
            'boarding_point' => 'Pathnadu',
            'drop_off_point' => 'Pathnadu',
             'user_id' => \App\Models\User::factory()->create([
                 'name' => 'Albin Varghese',
                 'email' => 'student2@gmail.com',
                 'password' => bcrypt('password'),
                 ])->id,
        ]);

        // Seed the students
        $student3 = \App\Models\Student::factory()->create([
            'boarding_point' => 'Kottayam',
            'drop_off_point' => 'Kottayam',
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Tintu Mon',
                'email' => 'student3@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of student to the users
        $student->user->assignRole('student');
        $student2->user->assignRole('student');
        $student3->user->assignRole('student');

        // get bus boarding point based on a place
        $busBoardingPoint = \App\Models\BusBoardingPoint::whereHas('boardingPoint', function ($query) {
            $query->where('place', 'Kumaranelloor');
        })->first();

        // Update the bus_boarding_point_id in the users table
        $student->user->bus_boarding_point_id = $busBoardingPoint->id;
        $student->user->save();

        // 2nd student

        // get bus boarding point based on a place
        $busBoardingPoint2 = \App\Models\BusBoardingPoint::whereHas('boardingPoint', function ($query) {
            $query->where('place', 'Pathnadu');
        })->first();

        // Update the bus_boarding_point_id in the users table
        $student2->user->bus_boarding_point_id = $busBoardingPoint2->id;
        $student2->user->save();

        // 3rd student
        $busBoardingPoint3 = \App\Models\BusBoardingPoint::whereHas('boardingPoint', function ($query) {
            $query->where('place', 'Kottayam');
        })->first();

        // Update the bus_boarding_point_id in the users table
        $student3->user->bus_boarding_point_id = $busBoardingPoint3->id;
        $student3->user->save();

        // seed the semester for the student
        \App\Models\StudentSemester::factory()->create([
            'student_id' => $student->id,
            'semester_id' => \App\Models\Semester::inRandomOrder()->first()->id,
            'start_date' => now()->subMonths(6),
            'end_date' => now()->addMonths(6),
            'status' => 'inactive',
            'is_current' => false,
        ]);

        \App\Models\StudentSemester::factory()->create([
            'student_id' => $student3->id,
            'semester_id' => \App\Models\Semester::inRandomOrder()->first()->id,
            'start_date' => now()->subMonths(6),
            'end_date' => now()->addMonths(6),
            'status' => 'inactive',
            'is_current' => false,
        ]);

        // seed the current semester for the student
        \App\Models\StudentSemester::factory()->create([
            'student_id' => $student->id,
            'semester_id' => \App\Models\Semester::inRandomOrder()->first()->id,
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
            'status' => 'active',
            'is_current' => true,
        ]);

        // seed the current semester for the student
        \App\Models\StudentSemester::factory()->create([
            'student_id' => $student3->id,
            'semester_id' => \App\Models\Semester::inRandomOrder()->first()->id,
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
            'status' => 'active',
            'is_current' => true,
        ]);

        // Seed the staff
        $staff = \App\Models\Staff::factory()->create([
            'department' => 'CSE',
            'designation' => 'Teacher',
            'bus_id' => 1,
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Jane Doe',
                'email' => 'staff1@gmail.com',
                'password' => bcrypt('password'),
                'bus_boarding_point_id' => $busBoardingPoint->id,
            ])->id,
        ]);

        // assign the role of staff to the user
        $staff->user->assignRole('staff');


        // Seed the guardians
        $guardian = \App\Models\Guardian::factory()->create([
            'occupation' => 'Business',
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'John Doe',
                'email' => 'guardian1@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of guardian to the user
        $guardian->user->assignRole('parent');

        // Seed the guardian_student
        \App\Models\GuardianStudent::factory()->create([
            'guardian_id' => $guardian->id,
            'student_id' => $student->id,
            'relationship' => 'Father',
        ]);

        // seed driver
        $driver = \App\Models\Driver::factory()->create([
            'license_number' => '123456789',
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Veerapan',
                'email' => 'driver1@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of driver to the user
        $driver->user->assignRole('driver');

        // assign the bus to the driver
        $driver->bus_id = $busBoardingPoint->bus_id;
        $driver->save();


        // Seed admin
        $admin = \App\Models\Admin::factory()->create([
            'user_id' => \App\Models\User::factory()->create([
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
            ])->id,
        ]);

        // assign the role of admin to the user
        $admin->user->assignRole('admin');

    }

}
