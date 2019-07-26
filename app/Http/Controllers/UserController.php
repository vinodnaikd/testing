<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use JWTFactory;
use JWTAuth;
use Response;
/**
 * Description of UserController
 *
 * @author tableau
 */
class UserController extends ApiController {
    //put your code here
    public function signup(Request $request) {
//        dd($request->all());
//        $request->validate([
//            'firstname' => 'required',
//            'lastname' => 'required',
//            'email' => 'required',
//        ]);
        $data['firstname'] = "vinod";
        $data['lastname'] = "naik";
        
        return $data;
    }
    
}
