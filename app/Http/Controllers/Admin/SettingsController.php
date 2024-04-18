<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class SettingsController extends Controller
{
    public function index()
    {
        $data['page_name'] = 'Software Setting';
        $data['settings'] = Setting::where('id', 1)->first();
        return view('admin.settings.index', $data);
    }

    public function settingsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'app_name' => 'required|max:191',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'discount_rate' => 'required|numeric',
        ]);

        $input = $request->all();
        $settings = Setting::find($id);
        $app_logo = $request->file('app_logo');
        if ($app_logo) {
            if (file_exists($settings->app_logo)) {
                unlink($settings->app_logo);
            }
            $app_logo_name = time() . '_' . $app_logo->getClientOriginalName();
            $app_logo_path = 'assets/logo/';
            Image::make($app_logo)->save($app_logo_path . $app_logo_name);
            $input['app_logo'] = $app_logo_path . $app_logo_name;
        }
        $app_favicon = $request->file('app_favicon');
        if ($app_favicon) {
            if (file_exists($settings->app_favicon)) {
                unlink($settings->app_favicon);
            }
            $app_favicon_name = time() . '_' . $app_favicon->getClientOriginalName();
            $app_favicon_path = 'assets/favicon/';
            Image::make($app_favicon)->save($app_favicon_path . $app_favicon_name);
            $input['app_favicon'] = $app_favicon_path . $app_favicon_name;
        }
        $settings->update($input);
        $notification = array(
            'message' => 'Software Setting Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
