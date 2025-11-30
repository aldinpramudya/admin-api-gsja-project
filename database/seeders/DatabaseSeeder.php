<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seeder For Users Table
     */
    public function run(): void
    {
        $superadminRole = Role::where('name', 'superadmin')->first();
        User::create([
            'name' => "Super Admin",
            'email' => "superadmin@gmail.com",
            'password' => Hash::make('password'),
            'role_id' => $superadminRole->id
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        $bendaharaRole = Role::where('name', 'bendahara')->first();
        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $bendaharaRole->id,
        ]);

        $pendetaRole = Role::where('name', 'pendeta')->first();
        User::create([
            'name' => "Pendeta 1",
            'email' => 'pendeta@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $pendetaRole->id
        ]);
    }
}
