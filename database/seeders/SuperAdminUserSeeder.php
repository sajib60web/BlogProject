<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'admin@gmail.com',
            'role_id' => 'Super Admin',
            'password' => bcrypt('123456')
        ]);
        $user = Admin::find(1);
        $role = Role::where('name', 'Super Admin')->first();
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->name]);
        Admin::find(1)->givePermissionTo($permissions);
        User::create([
            'name' => 'SB Sajib',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'role_id' => 'User',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
        ]);
    }
}
