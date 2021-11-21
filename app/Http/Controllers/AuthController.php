<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Mail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPassword;

class AuthController extends Controller
{
    public function register(Request $request){
        $payload = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>\Hash::make($request->password),
            'role'=>'User',
            'status'=>1,
        ];
        $existing = User::where('email', $request->email )->first();
        if (!is_null($existing)) {
            $response = ['success'=>false, 'message'=>'Email already registered'];
            return response()->json($response, 201);
        }

        if($request->password_confirmation != $request->password){
            $response = ['success'=>false, 'message'=>'Passwords Do Not Match'];   
            return response()->json($response, 201);
        }        
        $user = new \App\Models\User($payload);
        if ($user->save())
        {
            $user = \App\Models\User::where('email', $request->email)->first();
            $tokenResult = $user->createToken('authToken', ['User'])->plainTextToken;

            $user->save();
            $response = [
                'success'           => true,
                'status_code'       => 200,
                'token'             => $tokenResult,
                'tokentype'        => 'Bearer',
                'message'           => 'Registration succesful',
                'user'              =>  $user
            ];
            return response()->json($response, 201);
        }
    }
    
    public function login(Request $request){
        try {
                $request->validate([
                    'email'             => 'email|required',
                    'password'          => 'required'
                ]);
                if(!(User::where('email', $request->email)->exists())){
                    return response()->json([
                        'success'       =>  false, 
                        'message'       =>  "No account by this name. Please register",
                        'access_token'  =>  null
                    ]);
                }
                $credentials = request(['email', 'password']);
                if (!Auth::attempt($credentials)) {
                    return response()->json([
                        'success'       => false,
                        'status_code'   => 500,
                        'message'       => 'Incorrect or invalid Username or Password.',
                        'access_token'  =>  null
                    ]);
                }
                $user = User::where('email', $request->email)->first();
                if ( ! Hash::check($request->password, $user->password, [])) {
                    throw new \Exception('Error in Login');
                }
                if($user){ $tokenResult = $user->createToken('authToken', ['User'])->plainTextToken; }
                $user->token = $tokenResult;
                return response()->json([
                    'success'           => true,
                    'status_code'       => 200,
                    'token'             => $tokenResult,
                    'tokentype'        => 'Bearer',
                    'message'           => 'Welcome Aboard',
                    'user'              =>  $user
                ]);
            } 
        catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }

    // public function forgotPassword(Request $request){
    //     $response = [
    //         'success'           => true,
    //         'email'             => $request->email
    //     ];
    //     return response()->json($response, 201);
    // }

    public function forgotPassword(Request $request){
        $user = User::where('email', $request->email)->get()->first();
        if(is_null($user)){
            $response = ['success'=>false, 'message'=>"No account by this name. Please register"];
        }else{
            $token = substr(sha1(rand()), 0, 30);
            $date = now();
            DB::table('password_resets')
                ->updateOrInsert(
                    ['email' => $request->email],
                    ['token' => $token, 'created_at' => $date]
                );

            $user_email = $request->email;
            Mail::to( $user_email)->send(new ForgotPassword($token, $user)); 
            $response = ['success'=>true, 'message' => "Password Reset Email Sent. Please Check"];
        }
        return response()->json($response, 201);
    }

}
