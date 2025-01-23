<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = session('users', [
            ['id' => 1, 'name' => 'Name Surname', 'email' => 'NameSurname@example.com'],
            ['id' => 2, 'name' => 'Name Surname2', 'email' => 'NameSurname2@example.com'],
        ]);
        session(['users' => $users]);
        return view('admin.users.index', compact('users'));
    }


    public function edit($id)
    {
        $users = session('users', []);
        $user = collect($users)->firstWhere('id', $id);
        if (!$user) {
            abort(404, 'User not found');
        }
        return view('admin.users.edit', compact('user', 'id'));
    }

    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        $users = session('users', []);

        foreach($users as &$user){
            if($user['id'] == $id){
                $user['name'] = $valid['name'];
                $user['email'] = $valid['email'];
                break;
            }
        }
        session(['users' => $users]);
        return redirect()->route('admin.users.index');
    }

}
