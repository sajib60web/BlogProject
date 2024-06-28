<?php

namespace App\Http\Controllers\Auth;

use App\Enums\BlockStatus;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->status == Status::INACTIVE) {
            Auth::logout();
            $notification = array(
                'message' => 'Your account status is InActive',
                'alert-type' => 'error'
            );
            return redirect('/login')->with($notification);
        }
        if ($user->block_status == BlockStatus::BLOCK) {
            Auth::logout();
            $notification = array(
                'message' => 'Your account status is block',
                'alert-type' => 'error'
            );
            return redirect('/login')->with($notification);
        }
        if (Auth::check()) {
            if (Auth::user()->user_type == 1) {
                return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        }
    }
}
