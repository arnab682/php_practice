<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller 
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        //return view('auth.forgot-password');
        return view('frontend.layouts.pages.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        //edit code
        $u = User::join('roles', 'roles.user_id', '=', 'users.id')
                    ->where('email', $request->email)
                    ->first();
        $s = User::join('social_accounts', 'social_accounts.user_id', '=', 'users.id')
                    ->where('email', $request->email)
                    ->first();
        //dd($u);die();
        if($u == null){
            return back()->with('error', 'You are not eligible for this mail!');
        }elseif($u['superadmin'] == 1 || $s !== null){
            return back()->with('error', 'You are not eligible for this mail!');
        }else{
        
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
        }
    }
}
