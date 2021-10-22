<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Resources\UserResource;
use Auth;
use File;

class AccountController extends Controller
{
    public function getIndex(){
        $user_id = Auth::user()->id;
        return UserResource::make(Auth::user());
    }
    public function postData(Request $request){
        $account = new Account;
        $account->user_id = Auth::user()->id;
        $account->picture = '';
        $account->country_id = $request->country_id;
        $account->city = $request->city;
        $account->address = $request->address;
        $account->phone = $request->phone;
        $account->bio = $request->bio;
        $account->save();
        return UserResource::make(Auth::user());
    }
    public function update(Request $request){
        $user_id = Auth::user()->id;
        $account = Account::where('user_id',$user_id)->first();
        $account->picture = '';
        $account->country_id = $request->country_id;
        $account->city = $request->city;
        $account->address = $request->address;
        $account->phone = $request->phone;
        $account->bio = $request->bio;
        $account->save();
        return UserResource::make(Auth::user());
    }
    public function postUpdateOrCreate(Request $request){
        $user_id = Auth::user()->id;
        $request['picture'] = '';
        $account = Account::updateOrCreate(
            [
              'user_id' => $user_id,
            ], $request->all()
          );
          return UserResource::make(Auth::user());
    }
    public function loadImage(Request $request){
        if($request->has('picture1')){
            $account = Account::where('user_id', Auth::user()->id)->first();
            if($account){
                $img_path = public_path() . '/uploads/'. Auth::user()->id . '/' . $account->picture;
                if (File::exists($img_path)) {
                    //File::delete($image_path);
                    unlink($img_path);
                }
                $img_path_small = public_path() . '/uploads/'. Auth::user()->id . '/' . 'small-300x' . $account->picture;
                if (File::exists($img_path_small)) {
                    //File::delete($image_path);
                    unlink($img_path_small);
                }
            }
            $pic = \App::make('\App\Libs\Img')->url($_FILES['picture1']['tmp_name']);
            $account = Account::updateOrCreate([
                'user_id' => Auth::user()->id,
            ],[
                'picture'=>$pic
                ]
        );
            return response()->json(['message'=>'ok','account'=>$account]);
        }else{
            return response()->json(['message'=>'File does not sent']);
        }

        //dd($request->all());
    }
}
