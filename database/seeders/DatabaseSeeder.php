<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $admin = User::firstOrCreate(
            ['email' => 'admin@parkir.test'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );
        $admin->syncRoles([RolesAndPermissionsSeeder::ROLE_ADMIN]);

        $petugas = User::firstOrCreate(
            ['email' => 'petugas@parkir.test'],
            ['name' => 'Petugas', 'password' => Hash::make('password')]
        );
        $petugas->syncRoles([RolesAndPermissionsSeeder::ROLE_PETUGAS]);

        $owner = User::firstOrCreate(
            ['email' => 'owner@parkir.test'],
            ['name' => 'Owner', 'password' => Hash::make('password')]
        );
        $owner->syncRoles([RolesAndPermissionsSeeder::ROLE_OWNER]);
    }
}
