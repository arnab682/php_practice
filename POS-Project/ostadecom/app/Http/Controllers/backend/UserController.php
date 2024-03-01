<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\JWTToken;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request)
    {
         try{
            User::create([
                'email' => $request->email,
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

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        try{
            // $count = User::where([
            //             ['email', '=', $request->email],
            //             ['password', '=', $request->password],
            //         ])->count();
            // $count=User::where('email','=',$request->input('email'))
            //         ->where('password','=', $request->input('password'))
            //         ->select('id')->first();
            // return $count;
                    $request->validate([

                        'email' => 'required',

                        'password' => 'required',

                    ]);

   

        $credentials = $request->only('email', 'password');
        // return Auth::attempt($credentials);
        // $count = 0;
            if(Auth::attempt($credentials)){
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
