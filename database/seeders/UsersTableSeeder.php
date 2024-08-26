<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create the admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // You can set a more secure password
        ]);

        // Fetch the admin role
        $adminRole = Role::where('name', 'admin')->first();

        // Attach the admin role to the user
        if ($adminRole) {
            $adminUser->roles()->attach($adminRole->id);
        }

        // Create the user account
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // You can set a more secure password
        ]);

        // Fetch the user role
        $userRole = Role::where('name', 'user')->first();

        // Attach the user role to the user
        if ($userRole) {
            $user->roles()->attach($userRole->id);
        }

        // Create the guest account
        $guest = User::create([
            'name' => 'Guest User',
            'email' => 'guest@example.com',
            'password' => Hash::make('password'), // You can set a more secure password
        ]);

        // Fetch the guest role
        $guestRole = Role::where('name', 'guest')->first();

        // Attach the guest role to the user
        if ($guestRole) {
            $guest->roles()->attach($guestRole->id);
        }
    }
}
