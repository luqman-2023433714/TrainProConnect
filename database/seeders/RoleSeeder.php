<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'Owner',
            'description' => 'Full system control',
        ]);

        Role::create([
            'role_name' => 'Admin',
            'description' => 'Manage training system',
        ]);

        Role::create([
            'role_name' => 'Trainer',
            'description' => 'Conduct training',
        ]);

        Role::create([
            'role_name' => 'Participant',
            'description' => 'Attend training',
        ]);
    }
}