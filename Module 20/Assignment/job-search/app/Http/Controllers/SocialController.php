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
       $userSocial = Socialite::driver($social)->user();//dd($social);die();
       $user = User::where(['email' => $userSocial->email])->first();
       if($user){
           Auth::login($user);
           //return redirect()->action('HomeController@index');
           return redirect(route('candidateDashboard'));
       }else{
           //return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
            //return redirect(route('candidate.account'));
            $user = User::create([
                    'email' => $userSocial->email,
                    //'name' => $providerUser->getName()
                ]);
            $userData = [];
            $userData['name'] = $userSocial->name;
            $user->Profile()->create($userData);

            $socialData = [];
            $socialData['provider_user_id'] = $userSocial->id;
            $socialData['provider'] = $social;
            //Create social account
            $user->social_accounts()->create($socialData);
            $role = [];
            $role['candidate'] = 1;
            $user->Role()->create($role);
        
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
