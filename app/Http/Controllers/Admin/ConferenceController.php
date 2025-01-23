<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{

    public function index()
    {
        $conferences = session('conferences', [
            1 => ['id' => 1, 'title' => 'Tech Conference 2024', 'description' => 'Explore new technologies.', 'date' => '2024-06-15', 'location' => 'Tech City'],
            2 => ['id' => 2, 'title' => 'AI Summit', 'description' => 'Learn about AI advancements.', 'date' => '2024-07-20', 'location' => 'AI City'],
        ]);

        return view('admin.conferences.index', compact('conferences'));
    }


    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
    ]);

    $conferences = session('conferences', []);
    $newConference = [
        'id' => count($conferences) + 1,
        'title' => $validated['title'],
        'description' => $validated['description'],
        'date' => $validated['date'],
    ];

    $conferences[] = $newConference;
    session(['conferences' => $conferences]);

    return redirect()->route('admin.conferences.index')->with('success', 'Conference created successfully!');
}


public function edit($id)
{
    $conferences = session('conferences', []);
    $conference = collect($conferences)->firstWhere('id', $id);

    if (!$conference) {
        abort(404, 'Conference not found');
    }

    return view('admin.conferences.edit', compact('conference', 'id'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
    ]);

    $conferences = session('conferences', []);
    foreach ($conferences as &$conference) {
        if ($conference['id'] == $id) {
            $conference['title'] = $validated['title'];
            $conference['description'] = $validated['description'];
            $conference['date'] = $validated['date'];
            break;
        }
    }

    session(['conferences' => $conferences]);

    return redirect()->route('admin.conferences.index')->with('success', 'Conference updated successfully!');
}
public function destroy($id)
{

    $conferences = session('conferences', []);
    $conference = collect($conferences)->firstWhere('id', $id);

    if (!$conference) {
        return redirect()->route('admin.conferences.index')->with('error', 'Conference not found.');
    }
    if (now()->greaterThan($conference['date'])) {
        return redirect()->route('admin.conferences.index')->with('error', 'Cannot delete past conferences.');
    }
    $conferences = array_filter($conferences, function ($item) use ($id) {
        return $item['id'] != $id;
    });

    session(['conferences' => $conferences]);

    return redirect()->route('admin.conferences.index')->with('success', 'Conference deleted successfully!');
}
}

