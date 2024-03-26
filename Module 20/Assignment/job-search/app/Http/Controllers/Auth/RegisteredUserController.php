<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Exception;

use Illuminate\Support\Facades\URL;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        //return view('auth.register');
        return view('auth.login');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)//: RedirectResponse
    {
        try{
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $user = User::create([
        //     //'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        
        // $pro = [];
        // $pro['name'] = $request->name;
        // $pro['status'] = 1;
        // $user->Profile()->create($pro);
        // if(URL::current() === URL::to('/').'/register'){
        //     $user = User::create([
        //         //'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //     ]);
            
        //     $pro = [];
        //     $pro['name'] = $request->name;
        //     $pro['status'] = 1;
        //     $user->Profile()->create($pro);
        //     $role = [];
        //     $role['superadmin'] = 1;
        //     $user->Role()->create($role);
        //     //dd('superadmin');die();
        //     Auth::login($user);
        //     return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        // }
        if(URL::current() === URL::to('/').'/employers/register'){
            $user = User::create([
                //'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'year_of_establishment' => ['required', 'date'],
                'company_size' => ['required', 'string'],
                'address' => ['required', 'string'],
                'company_type' => ['required', 'string'],
                'url' => ['required', 'string'],
                'short_description' => ['required',],
                'license_no' => ['required', 'string'],
                'number' => ['required', 'string', 'max:15'],
            ]);
            
            //$pro = [];
            // $pro['name'] = $request->name;
            // $pro['status'] = 1;
            $user->Company()->create($data);
            $role = [];
            $role['company'] = 1;
            $user->Role()->create($role);
            Auth::login($user);
            return redirect()->route('welcome');
        }
        elseif(URL::current() === URL::to('/').'/candidate/register'){
            $user = User::create([
                //'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $pro = [];
            $pro['name'] = $request->name;
            $pro['status'] = 1;
            $user->Profile()->create($pro);
            $role = [];
            $role['candidate'] = 1;
            $user->Role()->create($role);
            Auth::login($user);
          return redirect()->route('welcome');           
        }else{
          return redirect()->route('welcome');
        }
        //event(new Registered($user));
        

       // Auth::login($user);

//        return redirect(RouteServiceProvider::HOME);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        } 

    }
}
