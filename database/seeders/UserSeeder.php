<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'name' => 'Jane',
            'surname' => 'Smith',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'name' => 'Mark',
            'surname' => 'Johnson',
            'email' => 'mark.johnson@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
