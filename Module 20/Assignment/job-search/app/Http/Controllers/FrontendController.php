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
            'companyName' => ['required', 'string', 'max:255'],
            'year_of_establishment' => ['required', 'date'],
            'company_size' => ['required', 'string'],
            'address' => ['required', 'string'],
            'company_type' => ['required', 'string'],
            'url' => ['required', 'string'],
            'short_description' => ['required',],
            'license_no' => ['required', 'string'],
            'number' => ['required', 'string', 'max:15'],
            'emailEmployer' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Company::class],
            'passwordEmployer' => ['required', 'min:8'],
        ]);

        $company = Company::create([
           $data
        ]);
        // $pro = [];
        // $pro['status'] = 1;
        // $user->Profile()->create($pro);
        // event(new Registered($user));

        // Auth::login($user);
        if($company){
            return redirect()->route('welcome');
        }else{
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

    
}
