<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;

use Auth;
use Socialite;

class AuthController extends Controller
{
    protected $redirectTo = '/home';

    public function redirectToProvider($provider){
        if(!config("services.$provider")) abort('404');

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = null){
        try{
            $user = Socialite::driver($provider)->user();
        }
        catch(Exception $e){
            return redirect(auth/facebook);
        }

        $authenticatedUser = $this->getOrCreateUser($user);
        \Auth::login($authenticatedUser, true);

        return redirect()->to('/home');
    }

    public function getOrCreateUser($user){
        $authenticatedUser = User::where('facebook_id', '=', $user->id)->first();

        //die($authenticatedUser);

        if($authenticatedUser){
            return $authenticatedUser;
        }

        $authenticatedUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'facebook_id' => $user->id,
            'avatar' => $user->avatar
        ]);

        $authenticatedUser->save();

        return $authenticatedUser;
    }
}