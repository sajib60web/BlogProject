<?php

use App\Models\Setting;
use App\Models\SocialLoginSetting;
use Carbon\Carbon;

//Time Zone
date_default_timezone_set('Asia/Kolkata');

if (!function_exists('setting')) {
    function setting()
    {
        return Setting::find(1);
    }
}


if (!function_exists('send_sms')) {
    function send_sms($number, $massage)
    {
        $url = 'https://powersms.banglaphone.net.bd/httpapi/sendsms';
        $fields = array(
            'userId' => urlencode('sohelenterprise'),
            'password' => urlencode('Sohelenterprise123'),
            'smsText' => urlencode($massage),
            'commaSeperatedReceiverNumbers' => $number,
        );

        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // If you have proxy
        // $proxy = '<proxy-ip>:<proxy-port>';
        // curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        $date  = DateTime::createFromFormat('d/m/Y', $date);
        return Carbon::parse($date)->format('d M Y');
    }
}

if (!function_exists('settingsSocial')) {
    function settingsSocial($title = "")
    {
        $settings = SocialLoginSetting::where('title', $title)->first();
        if ($settings) :
            return $settings->value;
        endif;
        return null;
    }
}
