<?php

namespace Social\Users\Http\Controllers;

use Illuminate\Routing\Controller;
use Social\Services\Contracts\UserContract;
use JWTFactory;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Social\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    protected $usercontainer;
    
    public function __construct(UserContract $usercontainer) {
        $this->usercontainer = $usercontainer;
    }
     
    public function register(Request $request){
       $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
       return response()->json(['message' => 'User register sucessfully', 'statusCode' => '200'], '200');
    }
    
    
    /**
     * Login into the System
     * @param \Social\Users\Http\Controllers\Request $request
     * @return type json
     */
    public function login(Request $request){
       $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    
    public function getUser(){
        return auth()->user();
    }
    
}
