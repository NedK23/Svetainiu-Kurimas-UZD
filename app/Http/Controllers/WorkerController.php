<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function index()
    {
        $conferences = Conference::All();

        return view('worker.conferences', compact('conferences'));
    }

    public function show($id)
    {
        $conference = Conference::findOrFail($id);
        $registration = $conference->users;

        return view('worker.conference_show', compact('conference', 'registration'));
    }

    public function unregister($id){
        $conference = Conference::findOrFail($id);
        if(!$conference->users->contains(Auth::id())){
            $conference->users()->detach(Auth::id());
        }
        return redirect()->route('worker.conference.show',$id);
    }
}
