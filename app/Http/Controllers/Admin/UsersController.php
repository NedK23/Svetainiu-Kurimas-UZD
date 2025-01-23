<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = [
            ['id' => 1, 'name' => 'Name Surname', 'email' => 'NameSurname@example.com'],
            ['id' => 2, 'name' => 'Name Surname2', 'email' => 'NameSurname2@example.com'],
        ];

        return view('admin.users.index', compact('users'));
    }


    public function edit($id)
    {
        $user = [
            'id' => $id,
            'name' => 'Name Surname',
            'email' => 'NameSurname@example.com',
        ];

        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }
}
