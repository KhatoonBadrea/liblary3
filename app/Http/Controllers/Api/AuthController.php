<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponseTrait;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email','exists:users,email'],
            'password' => ['required','string'],
        ]);
    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        $user=Auth::user();
        $token=$user->createToken('Sanctum',[])->plainTextToken;
        return $this-> loginResponse($user,$token);
       
    }
    else{
        return response()->json(false);
    }
}
    public function register(Request $request)
    {
       
           $validatore=Validator::make($request->all(),[
               'name' => 'required',
               'email' => 'required',
               'password' => 'required',]);
           
           if ($validatore->fails()){
               return response()->json($validatore->errors()->toJson(),status:400);
           }
           $user = User::create(array_merge(
               $validatore->validated(),
               ['password'=>bcrypt($request->password)]
           ));
             return response()->json([
               'message'=>'user successfully register',
               'user'=>$user
             ],status: 201);
            }

 

}
