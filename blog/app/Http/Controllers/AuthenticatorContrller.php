<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Events\EventNovoRegistro;

class AuthenticatorContrller extends Controller
{
    public function signup(Request $request) {
            $user = new User([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'token' => Str::random(60),
           
            ]);
        
            $user->save();

            return response()->json([
                'res'=>'Usuario criado com sucesso'
            ], 201);
    
    }

    public function login(Request $request) {
        
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password

        ];

        if (!Auth::attempt($credenciais))
            return response()->json([
                'res' => 'Acesso negado'
            ], 401);
        
        $email = $request->email;
        $user = $request->user();
        $token = $user->createToken('Token de acesso')->accessToken;

        return response()->json([
            'user'  => $user,
            'token' => $token
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'res' => 'Deslogado com sucesso'
        ]);
    }


}