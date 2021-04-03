<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenBlacklistException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
// use Illuminate\Support\Facades\JWTAuth;
use App\Supervisor;
class AuthController extends Controller
{
    //
    public function login(Request $request){
        $credentials=$request->only('usuario','password');
        $validator=Validator::make($credentials,[
            'usuario'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'message'=>'Wrong validation',
                'errors'=>$validator->errors(),
            ],422);
        }
        $token=JWTAuth::attempt($credentials);
        if($token){
            return response()->json([
                'success'=>true,
                'token'=>$token,
                'user'=>Supervisor::where('usuario',$credentials['usuario'])->get()->first(),
            ],200);
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'Wrong validation',
                'errors'=>$validator->errors(),
            ],401);
        }
    }
    public function refreshToken(){
        $token=JWTAuth::getToken();
        try{
            $token=JWTAuth::refresh($token);
            return response()->json([
                'success'=>true,
                'token'=>$token,
            ],200);
        }catch(TokenBlacklistException $ex){
            return response()->json([
                        'success'=>false,
                        'message'=>'Need to Login again',
                        'errors'=>$ex->errors(),
                    ],422);
        }catch(TokenExpiredException $ex) {
            return response()->json([
                'success'=>false,
                'message'=>'token expired',
                'errors'=>$ex->errors(),
            ],422);
        }
    }
    public function logout(){
        try{
            JWTAuth::invalidate();
            return response()->json([
                'success'=>true,
                'message'=>'Logout Successfully',
            ],200);
        }catch(JWTException $ex){
            JWTAuth::invalidate();
            return response()->json([
                'success'=>false,
                'message'=>'Failed logout, please try again',
            ],422);
        }
    }
     /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
    public function username(){
        return 'usuario';
    }
}
