<?php

namespace Database\Seeders;

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
            $student->assignRole('student');
        }
    }
}
