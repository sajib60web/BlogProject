<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'User', 'guard_name' => 'admin']);
        // Permission List as array
        $permissions = [
            [
                'group_name' => 'Role',
                'permissions' => [
                    // Role Permissions
                    'role-list',
                    'role-create',
                    'role-edit',
                    'role-delete',
                ]
            ],
            [
                'group_name' => 'User',
                'permissions' => [
                    // User Permissions
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete',
                ]
            ],
            [
                'group_name' => 'Settings',
                'permissions' => [
                    // Settings Permissions
                    'software-settings'
                ]
            ]
        ];

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j], 
                    'group_name' => $permissionGroup,
                    'guard_name' => 'admin'
                ]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
