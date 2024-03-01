<?php

namespace App\Http\Controllers\backend;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function userRegistation(Request $request):string{
        try{
            User::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->password,
            ]);

            return response()->json([
                'status' => 'suceess',
                'message' => 'Registation successful'
            ], 200);
        }catch (\Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Registation unsuccessful'
            ], 200);
        }
    }

    public function userLogin(Request $request):string {
        try{
            $count = User::where([
                        ['email', '=', $request->email],
                        ['password', '=', $request->password],
                    ])->count();
            if($count == 1){
                $token = JWTToken::createToken($request->email);
                //return $token;
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Login Successfully',
                    'token' => $token,
                ], 200);
            } else {
                return response()->JSON([
                    'status' => 'Failed',
                    'message' => 'Unauthorized',
                ], 200);
            }
        } catch(\Exception $e){
            return response()->JSON([
                    'status' => 'Failed',
                    'message' => $e->getMessage(),
                ], 200);
        }
        
        //return ;
    }

    function SendOTPCode(Request $request){
        try{
            $email = $request->email;
            $otp = rand(1000,9999);
            $count = User::where('email', '=', $email)
                    ->count();
            //return $otp;
            if($count == 1){
                Mail::to($email)->send(new OTPMail($otp));
                User::where('email', '=', $email)->update(['otp'=>$otp]);

                return response()->JSON([
                        'status' => 'Success',
                        'message' => 'Email send..',
                    ], 200);
            } else {
                return response()->JSON([
                        'status' => 'Failed',
                        'message' => 'Email Not Found!',
                    ], 200);
            }
        } catch(\Exception $e){
             return response()->JSON([
                    'status' => 'Failed',
                    'message' => $e->getMessage(),
                ], 200);
        }
    }


    function VerifyOTP(Request $request){
        $email = $request->email;
        $otp = $request->otp;
        $count = User::where('email', '=', $email)
                ->where('otp', '=', $otp)
                ->count();
        //return $otp;
        if($count == 1){
            //Database OTP Update
            User::where('email', '=', $email)
                ->update(['otp'=>'0']);

            //Pass Reset Token Issue
            $token=JWTToken::createTokenSetPassword($email);
            return response()->JSON([
                    'status' => 'Successful',
                    'message' => 'Create Successful',
                    'token' => $token
                ], 200); 
        } else{
           return response()->JSON([
                    'status' => 'Failed',
                    'message' => 'Unauthorized',
                ], 200); 
        }
    }

    function ResetPassword(Request $request){
        try{
            $email = $request->header('email');
            $password=$request->input('password');
            User::where('email', '=', $email)->update(['password'=>$password]);
            return response()->JSON([
                    'status' => 'Successful',
                    'message' => 'Password Reset Successful',
                ], 200); 
        } catch (\Exception $e) {
            return response()->JSON([
                    'status' => 'Failed',
                    'message' => $e->getMessage(),
                ], 500);
        }
    }

    
}
