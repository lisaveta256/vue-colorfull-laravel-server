<?php

 namespace App\Libs;

use Image;
use Auth;

class Img {
    public function url($path, $directory = null, $name = null){
        if($path!=null){
            if($directory!=null){
                $dir = public_path() . $dirrectory;
            }else{
                if(!Auth::guest()){
                    $dir = public_path() . '/uploads/'. Auth::user()->id . '/';
                    }else{
                    $dir = public_path() . '/uploads/0/';
                }
                if(!file_exists($dir)){
                    mkdir($dir, 0777, true);
                }
            }
            if($name != null){
                $filename = $name;
              }else{
                $filename = date('y_m_d_h_i_s').'.jpg';
              }
            $img = Image::make($path);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });      
            $img->save($dir . $filename);
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            }); 
            $picsmall = 'small-300x'. $filename;
            $img->save($dir .  $picsmall);
            return $filename;
        }else{
            return false;
        }
    }
}