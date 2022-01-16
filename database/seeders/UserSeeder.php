<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = User::factory()->count(5)->student()->create();
        $admin = User::factory()->admin()->create();

        $admin->assignRole('admin');

        foreach ($students as $student)
        {
            Car::factory()->create([
                'user_id' => $student->user_id
            ]);
            $student->assignRole('student');
        }

        Car::factory()->create([
            'user_id' => $admin->user_id
        ]);
    }
}
