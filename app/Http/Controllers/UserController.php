<?php

namespace App\Http\Controllers;
use App\Models\Conference;
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
        $conferences = Conference::all();

        return view('user.conference', compact('conferences'));
    }

    public function show($id)
    {
        $conference = Conference::find($id);

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
