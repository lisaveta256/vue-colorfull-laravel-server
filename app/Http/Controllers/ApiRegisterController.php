<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash; 
use \Illuminate\Http\Response;

class ApiRegisterController extends Controller
{
    public function getIndex(Request $request){
      //  dd($request->all());
      $user=User::create(
          $request->only('name', 'email')
          +['password'=>Hash::make($request->password)]
      );
     // return response($user);
      return response($user,Response::HTTP_CREATED);
    }
}
