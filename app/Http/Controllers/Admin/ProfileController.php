<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = User::find(auth()->id());
        return view('admin.profile.index', compact('profile'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required|min:6',
        ]);

        $input = $request->all();
        $profile = User::find($id);
        $input['name'] = $request->first_name . ' ' . $request->last_name;
        $profile->update($input);
        $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function changeProfilePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $profile = User::where('id', $request->user_id)->first();
        if (password_verify($request->old_password, $profile->password)) {
            $profile->password = Hash::make($request->password);
            $profile->save();
            $notification = array(
                'message' => 'Profile password changed',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Old password not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
