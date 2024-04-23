<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            SuperAdminUserSeeder::class,
            SettingSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            FaqSeeder::class,
            AboutSeeder::class,
            PageSeeder::class,
        ]);
    }
}
