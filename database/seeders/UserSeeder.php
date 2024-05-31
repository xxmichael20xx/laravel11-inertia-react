<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create User Admin
        $roleSuperAdmin = Role::where('name', User::ROLE_SUPER_ADMIN)->first();
        $userSuperAdmin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'superadmin@domain.com',
            'password' => bcrypt('password'),
        ]);

        // Attach Super Admin Role
        $userSuperAdmin->assignRole($roleSuperAdmin);
    }
}
