<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Setting
        Setting::create([
            'app_name' => 'Snapyaa',
            'app_logo' => null,
            'app_favicon' => null,
            'address' => 'Dhaka - 1216',
            'phone_number' => '01685108453',
            'email' => 'info@gmail.com'
        ]);
    }
}
