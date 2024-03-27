<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Banner;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $banners = Banner::where('status', 1)->get();
        // foreach($banners->images as $img){
        //     dd($img->image);die();
        // }
        // dd($banners);die();
        return view('welcome', compact('banners'));
    }



    public function employersAccount(){
        return view('frontend.employer.account');
    }

    public function loginEmployer(LoginRequest $request)
    { //dd($request);
        try{
            $request->authenticate();

            $request->session()->regenerate();

            //return redirect()->intended(RouteServiceProvider::HOME);

            $u = Role::where('user_id', Auth::id())->first();

            if($u->company){
                return redirect()->intended(RouteServiceProvider::HOME);
            } 
            else {
                Auth::guard('web')->logout();
                return redirect()
                    ->back()
                    ->with('error', 'Company email do not match!');
            }    

        }catch (\Exception $e){
            return redirect()
              ->back()
              ->withErrors($e->getMessage());
        }
    }

    public function candidateAccount(){
        return view('frontend.candidate.account');
    }

    public function loginCandidate(LoginRequest $request)
    { 
        try{
            $request->authenticate();

            $request->session()->regenerate();

            $u = Role::where('user_id', Auth::id())->first();

            if($u->candidate){
                return redirect()->intended(RouteServiceProvider::HOME);
            } 
            else {
                Auth::guard('web')->logout();
                return redirect()
                    ->back()
                    ->with('error', 'Candidate email do not match!');
            }            

        }catch (\Exception $e){
            return redirect()
              ->back()
              ->withErrors($e->getMessage());
        }
    }


    public function contact(){
        $contact = Contact::first();
        //dd($contact);die();
        return view('frontend.layouts.pages.contact.index', compact('contact'));
    }

    public function about(){
        return view('frontend.layouts.pages.about.index');
    }

    
}
