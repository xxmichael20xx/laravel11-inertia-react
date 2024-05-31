<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = database_path() . '/data/role_and_permissions.json';

        if (File::exists($file)) {
            $data = json_decode(File::get($file), true);

            foreach ($data as $row) {
                // Create Role
                $role = Role::firstOrCreate([
                    'name' => data_get($row, 'role')
                ]);

                if ($list = data_get($row, 'permissions')) {
                    foreach ($list as $item) {
                        // Create Permission
                        $permission = Permission::firstOrCreate([
                            'name' => $item
                        ]);

                        // Assign Permission to Role
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
    }
}
