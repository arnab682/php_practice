<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request) //: RedirectResponse
    {
        try{
            $request->authenticate();

            $request->session()->regenerate();

            $u = Role::where('user_id', Auth::id())->first();

            if($u->superadmin = 1){
                return response()->json(['status' => 'success', 'message' => "Request Successful"]);
            } 
            else {
                Auth::guard('web')->logout();
                return response()->json(['status' => 'error', 'message' => "Superadmin email do not match!"]);
                // return redirect()
                //     ->back()
                //     ->with('error', 'Superadmin email do not match!');
            }    
            
         //return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        } 
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
