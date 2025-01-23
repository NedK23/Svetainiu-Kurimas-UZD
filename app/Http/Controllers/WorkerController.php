<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $conferences = [
            ['id' => 1, 'title' => 'Tech Conference 2024', 'description' => 'Explore new technologies.', 'date' => '2024-06-15', 'location' => 'Tech City'],
            ['id' => 2, 'title' => 'Computer Science 2025', 'description' => '2025 Computer cool', 'date' => '2025-03-21', 'location' => 'London'],
            ['id' => 3, 'title' => 'AI Summit', 'description' => 'Learn about AI advancements.', 'date' => '2024-07-20', 'location' => 'AI City'],
        ];

        return view('worker.conferences', compact('conferences'));
    }

    public function show($id)
    {
        $conferences = [
            ['id' => 1, 'title' => 'Tech Conference 2024', 'description' => 'Explore new technologies.', 'date' => '2024-06-15', 'location' => 'Tech City'],
            ['id' => 2, 'title' => 'Computer Science 2025', 'description' => '2025 Computer cool', 'date' => '2025-03-21', 'location' => 'London'],
            ['id' => 3, 'title' => 'AI Summit', 'description' => 'Learn about AI advancements.', 'date' => '2024-07-20', 'location' => 'AI City'],
        ];
        // Find the conference by its 'id' field
        $conference = collect($conferences)->firstWhere('id', $id);

        if (!$conference) {
            abort(404, 'Conference not found.');
        }

        $registrations = session("conference_{$id}_registrations", []);

        return view('worker.conference_show', compact('conference', 'registrations'));
    }
}
