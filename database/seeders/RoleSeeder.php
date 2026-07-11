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
        Role::firstOrCreate([
            'role_name' => 'Admin'
        ],[
            'description' => 'System Administrator'
        ]);

        Role::firstOrCreate([
            'role_name' => 'Finance'
        ],[
            'description' => 'Finance Officer'
        ]);

        Role::firstOrCreate([
            'role_name' => 'Trainer'
        ],[
            'description' => 'Trainer'
        ]);

        Role::firstOrCreate([
            'role_name' => 'Student'
        ],[
            'description' => 'Participant'
        ]);
    }
}