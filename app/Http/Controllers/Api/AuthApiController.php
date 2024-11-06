<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Laravel\Sanctum\PersonalAccessToken;

use App\Models\User;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {

        try {
            /*
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            */

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            $token = PersonalAccessToken::where('tokenable_id', '=', $user->id)->get();

            /*
            $data = "";
            foreach($user->tokens as $tk){
                $data = $data . " - ".$tk->token;
            }
            return $data;
            */

            return $user->tokens->where('tokenable_id', '=', $user->id)->get();


            if(!isset($token[0])){
                return response()->json([
                    'status' => true,
                    'message' => 'User Logged In Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }else{

                return response()->json([
                    'status' => true,
                    'message' => 'User Logged In Successfully',
                    //'token' => update token
                ], 200);
            }
/*
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
*/
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "----" . $th->getMessage()
            ], 500);
        }
    }
}

