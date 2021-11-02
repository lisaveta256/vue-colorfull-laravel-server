<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use App\Models\TarifUser;
use App\Http\Resources\TarifResource;

class TarifController extends Controller
{
    /*
    public function __construct(){
        $this->middleware('tarif');
    }*/

    public function getIndex(){
        $tarifs = Tarif::all();
        return TarifResource::collection($tarifs);
    }
    /*public function postAdd(Tarif $tarif){
        //dd(auth()->user()->id, $tarif->id);
        $tarif_user = new TarifUser;
        $tarif_user->user_id=auth()->user()->id;
        $tarif_user->tarif_id=$tarif->id;
        $tarif_user->save();
        return response()->json($tarif_user, 201);
    }*/

    public function getCurrent(){
        $user_id = auth()->user()->id;
        $tarif_user_tarif_id = TarifUser::where('user_id',$user_id)->orderBy('updated_at', 'desc')->value('tarif_id');
        $tarif_user_tarif_updated_at = TarifUser::where('user_id',$user_id)->orderBy('updated_at', 'desc')->value('updated_at');
        $tarif_user_tarif_name=Tarif::find($tarif_user_tarif_id)->name;
        $tarif_user_info=(object)[];
        $tarif_user_info->tarif_user_tarif_id=$tarif_user_tarif_id;
        $tarif_user_info->tarif_user_tarif_name=$tarif_user_tarif_name;
        $tarif_user_info->tarif_user_tarif_updated_at=$tarif_user_tarif_updated_at;
        
        $data = (object)[];
        $data->user_info=auth()->user()->name;
        $data->tarif_info=$tarif_user_info;
        return response()->json($data, 201);
    }


    /*
    
    public function postAdd($tarif_id){
       $tarif = Tarif::find($tarif_id);
        $tarif_user = new TarifUser;
        $tarif_user->user_id=auth()->user()->id;
        $tarif_user->tarif_id=$tarif->id;
        $tarif_user->save();
        return response()->json($tarif_user, 201);
    }
    
    */
    
}
