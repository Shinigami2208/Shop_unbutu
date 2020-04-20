<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

class SocialAuthController extends Controller
{
    //
    public function loginGoogleCallback(Request $request){
        $googleUSer = Socialite::driver('Google')->user();
        if(!$googleUSer){
            return 'Cannot Authenticate!';
        }

        $systemUser = User::where('google_id', $googleUSer->id)->get()->first();

        // Da co tren he thong
        if($systemUser){
            Auth::loginUsingId($systemUser->id);
            return redirect()->route('home');
        }else{ //Chua dang ky tren he thong
            $newUser = User::Create([
                'name' => $googleUSer->name,
                'email' => $googleUSer->email,
                'google_id' => $googleUSer->id,
            ]);
            Auth::loginUsingId($newUser->id);
            return redirect()->route('home');
        }
    }

    public function loginFacebookCallback(Request $request){
        $facebookUSer = Socialite::driver('Facebook')->user();
        if(!$facebookUSer){
            return 'Cannot Authenticate!';
        }

        $systemUser = User::where('facebook_id', $facebookUSer->id)->get()->first();

        // Da co tren he thong
        if($systemUser){
            Auth::loginUsingId($systemUser->id);
            return redirect()->route('home');
        }else{ //Chua dang ky tren he thong
            $newUser = User::Create([
                'name' => $facebookUSer->name,
                'email' => ($facebookUSer->email) ?? '',
                'facebook_id' => $facebookUSer->id,
            ]);
            Auth::loginUsingId($newUser->id);
            return redirect()->route('home');
        }
    }
}
