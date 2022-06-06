<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function login(Request $request)
    {
       if(!Auth::attempt($request->only('email', 'password')))
       {
           return response([
               'message' => 'Invalid Credentials'
           ], Response::HTTP_UNAUTHORIZED);
       }

       $user = Auth::user();

       $token = $user->createToken('token')->plainTextToken;

       $cookie = cookie('jwt',$token, 60 * 24); //1 day

       return response([
           'message' => $token
       ])->withCookie($cookie);
    }

    public function user()
    {
        //return Auth::user();

        $user = User::where('id',1)->first();
        return $user;
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }





}
