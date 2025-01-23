<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        if (!session()->has('name') || !session()->has('surname')) {
            session(['name' => 'Name', 'surname' => 'Surname']);
        }
    }

    public function index()
    {
        $conferences = [
            ['id' => 1, 'title' => 'Tech Conference 2024', 'description' => 'Explore new technologies.', 'date' => '2024-06-15', 'location' => 'Tech City'],
            ['id' => 2, 'title' => 'Computer Science 2025', 'description' => '2025 Computer cool', 'date' => '2025-03-21', 'location' => 'London'],
            ['id' => 3, 'title' => 'AI Summit', 'description' => 'Learn about AI advancements.', 'date' => '2024-07-20', 'location' => 'AI City'],
        ];

        return view('user.conference', compact('conferences'));
    }

    public function show($id)
    {
        $conferences = [
            ['id' => 1, 'title' => 'Tech Conference 2024', 'description' => 'Explore new technologies.', 'date' => '2024-06-15', 'location' => 'Tech City'],
            ['id' => 2, 'title' => 'Computer Science 2025', 'description' => '2025 Computer cool', 'date' => '2025-03-21', 'location' => 'London'],
            ['id' => 3, 'title' => 'AI Summit', 'description' => 'Learn about AI advancements.', 'date' => '2024-07-20', 'location' => 'AI City'],
        ];

        $conference = collect($conferences)->firstWhere('id', $id);

        if (!$conference) {
            abort(404, 'Conference not found.');
        }

        return view('user.conference_show', compact('conference'));
    }

    public function register(Request $request, $id)
    {
        $name = session('name', 'Name');
        $surname = session('surname', 'Surname');
        $registrations = session("conference_{$id}_registrations", []);

        $registrations[] = ['name' => $name, 'surname' => $surname];

        session(["conference_{$id}_registrations" => $registrations]);

        return redirect()->route('user.conference.show', $id)
                         ->with('success', 'You have successfully registered for the conference!');
    }
}
