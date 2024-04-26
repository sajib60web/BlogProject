<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Upload;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class SocialLoginController extends Controller
{


    public function socialRedirect($social)
    {

        if ($social == 'google') :
            if (settingsSocial('google_status') != Status::ACTIVE) :

                $notification = array(
                    'message' => 'Google login is not enabled',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            endif;
            \Config([
                'services.google.client_id'        => settingsSocial('google_client_id'),
                'services.google.client_secret'    => settingsSocial('google_client_secret'),
                'services.google.redirect'         => url('google/login')
            ]);

            return Socialite::driver('google')->redirect();

        elseif ($social == 'facebook') :

            if (settingsSocial('facebook_status') != Status::ACTIVE) :
                $notification = array(
                    'message' => 'Facebook login is not enabled',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            endif;
            \Config([
                'services.facebook.client_id'        => settingsSocial('facebook_client_id'),
                'services.facebook.client_secret'    => settingsSocial('facebook_client_secret'),
                'services.facebook.redirect'         => url('facebook/login')
            ]);

            return Socialite::driver('facebook')->redirect();

        elseif ($social == 'github') :

            if (settingsSocial('github_status') != Status::ACTIVE) :
                $notification = array(
                    'message' => 'Github login is not enabled',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            endif;

            \Config([
                'services.github.client_id'        => settingsSocial('github_client_id'),
                'services.github.client_secret'    => settingsSocial('github_client_secret'),
                'services.github.redirect'         => url('github/login')
            ]);

            return Socialite::driver('github')->redirect();
        endif;


        $notification = array(
            'message' => 'Something went wrong!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }
    public function authGoogleLogin(Request $request)
    {
        try {

            \Config([
                'services.google.client_id'        => settingsSocial('google_client_id'),
                'services.google.client_secret'    => settingsSocial('google_client_secret'),
                'services.google.redirect'         => url('google/login')
            ]);

            $user      = Socialite::driver('google')->user();
            $existUser = User::where('google_id', $user->id)->first();
            if ($existUser) :
                Auth::login($existUser);
                return redirect('/');
            else :
                $user = $this->socialSignupStore($user, 'google');
                if ($user) :
                    Auth::login($user);
                    return redirect('/');
                else :
                    $notification = array(
                        'message' => 'Something went wrong!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                endif;
            endif;
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function authFacebookLogin()
    {
        try {

            \Config([
                'services.facebook.client_id'        => settingsSocial('facebook_client_id'),
                'services.facebook.client_secret'    => settingsSocial('facebook_client_secret'),
                'services.facebook.redirect'         => url('facebook/login')
            ]);
            $user        = Socialite::driver('facebook')->user();

            $existUser   = User::where('facebook_id', $user->id)->first();
            if ($existUser) :
                Auth::login($existUser);
                return redirect('/');
            else :
                $user = $this->socialSignupStore($user, 'facebook');
                if ($user) :
                    Auth::login($user);
                    return redirect('/');
                else :
                    $notification = array(
                        'message' => 'Something went wrong!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                endif;
            endif;
        } catch (\Throwable $th) {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }



    public function authGithubLogin()
    {
        try {


            \Config([
                'services.github.client_id'        => settingsSocial('github_client_id'),
                'services.github.client_secret'    => settingsSocial('github_client_secret'),
                'services.github.redirect'         => url('github/login')
            ]);

            $user        = Socialite::driver('github')->user();
            $existUser   = User::where('github_id', $user->id)->first();
            if ($existUser) :
                Auth::login($existUser);
                return redirect('/');
            else :
                $user = $this->socialSignupStore($user, 'github');
                if ($user) :
                    Auth::login($user);
                    return redirect('/');
                else :
                    $notification = array(
                        'message' => 'Something went wrong!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                endif;
            endif;
        } catch (\Throwable $th) {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function authLinkedinLogin()
    {
        try {


            \Config([
                'services.linkedin.client_id'        => settingsSocial('linkedin_client_id'),
                'services.linkedin.client_secret'    => settingsSocial('linkedin_client_secret'),
                'services.linkedin.redirect'         => url('linkedin/login')
            ]);

            $user        = Socialite::driver('linkedin')->user();
            $existUser   = User::where('linkedin_id', $user->id)->first();
            if ($existUser) :
                Auth::login($existUser);
                return redirect('/');
            else :
                $user = $this->socialSignupStore($user, 'linkedin');
                if ($user) :
                    Auth::login($user);
                    return redirect('/');
                else :
                    $notification = array(
                        'message' => 'Something went wrong!',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                endif;
            endif;
        } catch (\Throwable $th) {

            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }



    //social login merchant signup

    public function socialSignupStore($request,$social) {

        try {
            DB::beginTransaction();
            $user                       = new User();
            $user->name                 = $request->name;
            $user->email                = $request->email;
            if($social == 'google'):
                $user->google_id        = $request->id;
            elseif($social == 'facebook'):
                $user->facebook_id      = $request->id;
            elseif($social == 'github'):
                $user->github_id      = $request->id;
            elseif($social == 'linkedin'):
                $user->linkedin_id      = $request->id;
            endif;
            $user->email_verified_at    = Carbon::now();
            $user->password             = Hash::make(\Str::random(32));
            $user->save();
            DB::commit();
            return $user;
       }
        catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }


}
