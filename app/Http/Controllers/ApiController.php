<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use App\User;
class ApiController extends Controller
{
     public function __construct()
    {
        $this->user = new User;
    }
    
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
            ],
        ]);
    }

    public function createuser(Request $request){
    	$s = new User([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=> bcrypt($request->input('password')),
    	]);


       $s->save();
    	 $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
            ],
        ]);
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);        
        return response()->json(['result' => $user]);
    }

    public function logout(Request $request){
        
      // JWTAuth::logout();
       //JWTAuth::getToken();
       JWTAuth::invalidate(JWTAuth::getToken());
       return;
    }
}

