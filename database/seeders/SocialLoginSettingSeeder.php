<?php

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\SocialLoginSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialLoginSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Facebook
        SocialLoginSetting::create(['title' => 'facebook_client_id',     'value' => '']);
        SocialLoginSetting::create(['title' => 'facebook_client_secret', 'value' => '']);
        SocialLoginSetting::create(['title' => 'facebook_status',        'value' => Status::ACTIVE]);

        //Google
        SocialLoginSetting::create(['title' => 'google_client_id',     'value' => '']);
        SocialLoginSetting::create(['title' => 'google_client_secret', 'value' => '']);
        SocialLoginSetting::create(['title' => 'google_status',        'value' => Status::ACTIVE]);

        //Github
        SocialLoginSetting::create(['title' => 'github_client_id',     'value' => '']);
        SocialLoginSetting::create(['title' => 'github_client_secret', 'value' => '']);
        SocialLoginSetting::create(['title' => 'github_status',        'value' => Status::ACTIVE]);

        //Linkedin
        SocialLoginSetting::create(['title' => 'linkedin_client_id',     'value' => '']);
        SocialLoginSetting::create(['title' => 'linkedin_client_secret', 'value' => '']);
        SocialLoginSetting::create(['title' => 'linkedin_status',        'value' => Status::INACTIVE]);
    }
}
