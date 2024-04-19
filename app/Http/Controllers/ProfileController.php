<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image as Image;

class ProfileController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    public function profile()
    {
        $data['page_name'] = 'Profile';
        $data['profile'] = User::find(auth()->id());
        return view('auth.profile', $data);
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'confirmed'
        ]);

        $profile = User::find(auth()->id());
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->address = $request->address;
        $profile->about = $request->about;
        if (!empty($request->password)) {
            $profile->password = Hash::make($request->password);
        } else {
            $profile->password = $profile->password;
        }
        $picture = $request->file('picture');
        if ($picture) {
            if (file_exists($profile->picture)) {
                unlink($profile->picture);
            }
            $picture_name = time() . '.' . $picture->getClientOriginalExtension();
            $picture_path = 'assets/uploads/picture/';
            Image::make($picture)->save($picture_path . $picture_name);
            $profile->picture = $picture_path . $picture_name;
        }
        $profile->save();
        $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
