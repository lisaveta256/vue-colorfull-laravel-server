<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function postRegister(Request $request){
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|confirmed'
        ]);
       // dd($request->all());
        $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myToken')->plainTextToken;
        $response = [
            'user'=> $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function postLogin(Request $request){
       // return response()->json($request->all());
        $fields = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $user = User::where('email', $fields['email'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json([
                'message'=>'Email or password is incorrect.'
            ]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        $response = [
            'user'=> $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function postLogout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message'=>'Log out'
        ]);
    }
}

