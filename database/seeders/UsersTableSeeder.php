<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $workerRole = Role::firstOrCreate(['name' => 'worker']);
        $clientRole = Role::firstOrCreate(['name' => 'client']);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
        ]);
        $admin->roles()->attach($adminRole);

        $worker = User::create([
            'name' => 'worker',
            'email' => 'worker@example.com',
            'password' => Hash::make('worker'),
        ]);
        $worker->roles()->attach($workerRole);

        $client = User::create([
            'name' => 'client',
            'email' => 'client@example.com',
            'password' => Hash::make('client'),
        ]);
        $client->roles()->attach($clientRole);
    }
}
