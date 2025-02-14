<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        Role::firstOrCreate([
            'name' => 'Usuario',
            'slug' => 'user',
        ]);

        User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret22'),
            'role_id' => $adminRole->id
        ]);
    }
}
