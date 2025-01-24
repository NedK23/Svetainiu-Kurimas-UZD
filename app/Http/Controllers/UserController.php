<?php

namespace App\Http\Controllers;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $conference = Conference::findOrFail($id);

        if (!$conference) {
            abort(404, 'Conference not found.');
        }
        $IsRegistered = $conference->users->contains(Auth::id());
        return view('user.conference_show', compact('conference','IsRegistered'));
    }

    public function register($id){
        $conference = Conference::findOrFail($id);
        if(!$conference->users->contains(Auth::id())){
            $conference->users()->attach(Auth::id());
        }
        return redirect()->route('user.conference.show',$id);
    }
}
