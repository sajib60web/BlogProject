<?php

namespace Database\Seeders;

use App\Enums\UserType;
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
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'admin@gmail.com',
            'role_id' => 'Super Admin',
            'password' => bcrypt('123456'),
            'user_type' => UserType::ADMIN,
            'email_verified_at' => now(),
        ]);
        $user = User::find(1);
        $role = Role::where('name', 'Super Admin')->first();
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->name]);
        User::find(1)->givePermissionTo($permissions);
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
