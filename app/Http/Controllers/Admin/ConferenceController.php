<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conference;

class ConferenceController extends Controller
{

    public function index()
    {
        //Conference list

        $conferences = Conference::all();

        return view('admin.conferences.index', compact('conferences'));
    }


    public function create()
    {

    //Conference Creation
    //Redirects admin to the creation panel (create.blade.php)
    //Data gets inserted into DB (database.sqlite)

        return view('admin.conferences.create');
    }

    public function store(Request $request)
{
    //Conference Creation
    //Stores data into DB (database.sqlite)

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
    ]);

    Conference::create($validated);
    return redirect()->route('admin.conferences.index');
}


public function edit($id)
{
    //Conference Editing

    $conference = Conference::findOrFail($id);
    return view('admin.conferences.edit', compact('conference'));

}

public function update(Request $request, $id)
{

    //Updates the conference with inputed data from the edit page.
    //Data gets updated and replaced with new conference data.

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
    ]);

    $conference = Conference::findOrFail($id);
    $conference->update($validated);

    return redirect()->route('admin.conferences.index');
}

// Conference data deletion function.

public function destroy($id)
{
    $conference = Conference::findOrFail($id);

    // Dissalow the deletion of past conferences

    if (now()->greaterThan($conference->date)){
        return redirect()->route('admin.conferences.index');
    }

    $conference->delete();
    return redirect()->route('admin.conferences.index');
}
}

