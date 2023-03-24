<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request){
        $validateData = $request->validate([
            "name" => 'required|max:55',
            "email" => 'email|required|unique:users',
            "password" => "required|confirmed"
        ]);

        $validate["password"] = Hash::make($request->password);

        $user = User::create($validateData);

        $accessToken = $user->createToken("authToken")->accessToken;

        return response(["user"->$user,"access_token"=>$accessToken], 201);
    }

    public func
}
