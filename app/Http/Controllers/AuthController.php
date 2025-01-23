<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $valid = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
        ]);
        $user = User::create([
            'name' => $valid['name'],
            'surname' => $valid['name'],
            'email' => $valid['email'],
            'password' => Hash::make($valid['password']),
        ]);

        $clientRole = Role::where('name', 'client')->first();
        $user->roles()->attach($clientRole);
        session([
            'user_role' => $user->roles->pluck('name')->first(),
            'user_name' => $user->name,
            'user_surname' => $user->surname,
        ]);
        //dd(
        Auth::login($user);

        return redirect()->route('index');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials)){
            $user = Auth::user();

            session(['user_role' => $user->roles->pluck('name')->first()]);
            session([
                'user_role' => $user->roles->pluck('name')->first(),
                'user_name' => $user->name,
                'user_surname' => $user->surname,
            ]);
            //dd(session()->all());
            return redirect()->route('index');

        }
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request ->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
