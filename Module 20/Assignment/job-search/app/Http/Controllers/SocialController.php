<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
   public function socialLogin($social)
   {
       return Socialite::driver($social)->redirect();
   }

   public function handleProviderCallback($social)
   {
       $userSocial = Socialite::driver($social)->user();
       $user = User::where(['email' => $userSocial->getEmail()])->first();
       if($user){
           Auth::login($user);
           //return redirect()->action('HomeController@index');
           return redirect(route('candidateDashboard'));
       }else{
           //return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
            //return redirect(route('candidate.account'));
            $user = User::create([
                    'email' => $userSocial->getEmail(),
                    //'name' => $providerUser->getName()
                ]);
            $user->Profile()->create([
                'name' => $userSocial->getName()
            ]);
            //Create social account
            $user->social_accounts()->create([
                    'provider_user_id' => $userSocial->getId(),
                    'provider' => $userSocial
                ]);
        
            auth()->login($user);

            return redirect(route('candidateDashboard'));
        }
    } 

    // function createUser($providerUser, $provider)
    // {
       
        
    //         //Check if user with same email address exist
    //         $user = User::where('email', $providerUser->getEmail())->first();
        
    //         //Create user if dont'exist
    //         if (!$user) {
    //             $user = User::create([
    //                 'email' => $providerUser->getEmail(),
    //                 //'name' => $providerUser->getName()
    //             ]);
    //         $user->Profile()->create([
    //             'name' => $providerUser->getName()
    //         ]);
    //         //Create social account
    //         $user->social_accounts()->create([
    //                 'provider_user_id' => $providerUser->getId(),
    //                 'provider' => $provider
    //             ]);
        
    //         auth()->login($user);

    //         return redirect(route('candidateDashboard'));
    //     }
    // }
}
