<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conference;

class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conference::create([
            'title' => 'Tech Conference 2024',
            'description' => 'Explore new technologies.',
            'date' => '2024-06-15',
            'location' => 'Tech City',
        ]);

        Conference::create([
            'title' => 'Computer Science 2025',
            'description' => '2025 Computer cool',
            'date' => '2025-03-21',
            'location' => 'London',
        ]);

        Conference::create([
            'title' => 'AI Summit',
            'description' => 'Learn about AI advancements.',
            'date' => '2024-07-20',
            'location' => 'AI City',
        ]);
        Conference::create([
            'title' => 'test',
            'description' => 'test',
            'date' => '2060-07-20',
            'location' => 'test City',
        ]);
    }
}
