<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Course::factory(10)
            ->has(Subject::factory()->count(32))
            ->has(Student::factory()->count(50))
            ->create();
        // Student::factory(50)->create();
        // Subject::factory(10)->create();

        // User::factory(5)->create();

        $password = '12345678';
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@email.com',
            'password' => $password ??= Hash::make($password),
        ]);
    }
}
