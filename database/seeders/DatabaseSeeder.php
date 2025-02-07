<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Instructor User
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'profile' => 'instructor.jpg', // Dummy profile image
            'email' => 'instructor@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Hashing password
            'country' => 'USA',
            'role' => 'instructor',
            'newsletter_subscription' => true,
            'description' => 'Experienced instructor in web development.',
            'facebook_url' => 'https://facebook.com/johndoe',
            'x_url' => 'https://x.com/johndoe',
            'instagram_url' => 'https://instagram.com/johndoe',
            'remember_token' => null,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Student User
        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'profile' => 'student.jpg', // Dummy profile image
            'email' => 'student@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'country' => 'Canada',
            'role' => 'student',
            'newsletter_subscription' => false,
            'description' => 'Passionate learner exploring new technologies.',
            'facebook_url' => 'https://facebook.com/janesmith',
            'x_url' => 'https://x.com/janesmith',
            'instagram_url' => 'https://instagram.com/janesmith',
            'remember_token' => null,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
