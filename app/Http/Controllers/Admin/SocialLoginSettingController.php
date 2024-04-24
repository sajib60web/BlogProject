<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SocialLoginSetting;
use Illuminate\Http\Request;

class SocialLoginSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:social-login-list|social-login-update', ['only' => ['index', 'store']]);
        $this->middleware('permission:social-login-update', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_name'] = 'Social Login Setting';
        $data['pages'] = Page::orderBy('id', 'ASC')->get();
        return view('admin.social_login_settings.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function settingUpdate(Request $request)
    {
        if ($request->facebook) {
            $ignore[]                  = "facebook";
            $request['facebook_status'] = $request->facebook_status == 'on' ? Status::ACTIVE : Status::INACTIVE;
        } elseif ($request->google) {
            $ignore[]                  = "google";
            $request['google_status'] = $request->google_status == 'on' ? Status::ACTIVE : Status::INACTIVE;
        } elseif ($request->github) {
            $ignore[]                  = "github";
            $request['github_status'] = $request->github_status == 'on' ? Status::ACTIVE : Status::INACTIVE;
        } elseif ($request->linkedin) {
            $ignore[]                  = "linkedin";
            $request['linkedin_status'] = $request->linkedin_status == 'on' ? Status::ACTIVE : Status::INACTIVE;
        }
        foreach ($request->except($ignore) as $key => $value) {
            $settings        = SocialLoginSetting::where('title', $key)->first();
            if ($settings) {
                $settings->value   = $value;
                $settings->save();
            }
        }
        $notification = array(
            'message' => 'Social Login Setting Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
