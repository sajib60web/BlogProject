<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminForgotPasswordController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('admin.auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('admin.auth.forgetPasswordEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        $token_data = DB::table('password_resets')->where('token', $token)->first();
        return view('admin.auth.forgetPasswordLink', ['token' => $token, 'token_data' => $token_data]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        Admin::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect()->route('admin.show.login')->with('message', 'Your password has been changed!');
    }
}
