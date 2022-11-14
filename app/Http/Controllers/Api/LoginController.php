<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller{

    public function login(Request $request)
    {

        $dados = $request->only(['email','password']);
        if(!Auth::attempt($dados))
        {
            return response()->json(['error'=> 'failed to login'],406);
        }
        $user = Auth::user();

        $token =  $user->createToken('verified');


        return response()->json(['token'=> $token->plainTextToken,'name'=> $user->name]);
    }



}
