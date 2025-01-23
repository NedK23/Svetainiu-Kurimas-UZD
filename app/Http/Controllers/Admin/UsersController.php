<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = ['client','worker','admin'];
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'roles' => 'required|string|in:client,worker,admin',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $valid['name'],
            'email' => $valid['email'],
        ]);
        $user->roles()->sync([$valid['role']]);
        return redirect()->route('admin.users.index');
    }

}
