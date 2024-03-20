<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function employersAccount(){
        return view('frontend.employer.account');
    }

    public function storeEmployer(Request $request)
    { //dd($request);
        try{
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Company::class, 'unique:'.User::class],
            'password' => ['required', 'min:8'],
        ]);
        $data['name'] = $request->name;
        $data['year_of_establishment'] = $request->year_of_establishment;
        $data['company_size'] = $request->company_size;
        $data['address'] = $request->address;
        $data['company_type'] = $request->company_type;
        $data['url'] = $request->url;
        $data['short_description'] = $request->short_description;
        $data['license_no'] = $request->license_no;
        $data['number'] = $request->number;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
       //dd($data);die();

        $company = Company::create($data);

        //$request->session()->regenerate();
        // $pro = [];
        // $pro['status'] = 1;
        // $user->Profile()->create($pro);
        // event(new Registered($user));

        // Auth::login($user);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('welcome');
        }
        else{
            return redirect()->back();
        }

        //return redirect()->back();
           // return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return redirect()
              ->back()
              ->withErrors($e->getMessage());
        }
    }

    public function candidateAccount(){
        return view('frontend.candidate.account');
    }

    public function signupCandidateAccount(){
        return view('frontend.candidate.account');
    }


    public function contact(){
        $contact = Contact::first();
        //dd($contact);die();
        return view('frontend.contact.index', compact('contact'));
    }

    public function about(){
        return view('frontend.about.index');
    }

    
}
