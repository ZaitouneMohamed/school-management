<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => 1,
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Teacher',
                'email' => 'teacher@teacher.com',
                'role' => 2,
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Student',
                'email' => 'student@student.com',
                'role' => 3,
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Parent',
                'email' => 'parent@parent.com',
                'role' => 4,
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
