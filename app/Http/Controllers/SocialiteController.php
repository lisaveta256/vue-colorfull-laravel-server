<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialiteController extends Controller
{
    
    public function getVK(){
        return Socialite::driver('vkontakte')->redirect();
    } 
    public function getVKcallBack(){
        $user = Socialite::driver('vkontakte')->stateless()->user();
        return $this->registerOrLogin($user,1);
        //return response()->json($user);
    } 

    public function getGoogle(){
       
        return Socialite::driver('google')->redirect();
    } 
    public function getGoogleCallBack(){
        
        $user = Socialite::driver('google')->stateless()->user();
        return $this->registerOrLogin($user,1);
        //return response()->json($user);
    } 
    private function registerOrLogin($userSocial=null, $social_id=null){
        abort_if(!$userSocial->email, 403, 'В запросе отсутствует email');
            $user = User::where('email', $userSocial->email)->first();
            if ($user) {
                $token = $user->createToken('myToken')->plainTextToken;
            }else{
                $password = User::generatePassword();
                $user = User::create(
                    [
                        'name'     => $userSocial->name ?? '',
                        //'surname'  => $request->surname ?? '',
                        'email'    => $userSocial->email,
                        'password' => User::createPassword($password),
                    ]
                );
                $token = $user->createToken('myToken')->plainTextToken;
            }
            $response    = [
                'token'       => $token,
                'user'        => $user
            ];
            return response()->json($response);
    }
}
