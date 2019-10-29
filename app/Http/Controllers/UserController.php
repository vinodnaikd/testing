<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Response;
use Carbon\Carbon;
/**
 * Description of UserController
 *
 * @author tableau
 */
class UserController extends ApiController {
    //put your code here
    public function signup(Request $request) {
        // $user = new User;
        $user['email'] = $request->email;
        $user['password'] = bcrypt($request->password);
        // dd($user);
        // $user->save();
        $users=User::insertGetId($user);
        
        return $users;
    }
    public function login(Request $request){
    	 $credentials = $request->only('email', 'password');
    	 // $details=array('email'=>$request->email,'password'=>bcrypt($request->password));
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            return response()->json(compact('token'));
    }
    
}
