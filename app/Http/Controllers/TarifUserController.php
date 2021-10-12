<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use App\Models\User;
use App\Models\TarifUser;
use App\Http\Resources\TarifResource;
use App\Http\Resources\UserResource;
use Auth;

class TarifUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs = Tarif::with('tarifUser')->get();
       // $tarifs = Tarif::all();

       /* foreach($tarifs as $one){ 
            dump($one->tarifUser->toArray());
          //  dump($one->tarifUser()->get()->toArray());
        }*/

        return TarifResource::collection($tarifs);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tarif $tarif)
    {
        //dd(auth()->user()->id, $tarif->id);
        $tarif_user = new TarifUser;
        $tarif_user->user_id=auth()->user()->id;
        $tarif_user->tarif_id=$tarif->id;
        $tarif_user->save();
        return response()->json($tarif_user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarif=Tarif::with('tarifUser')->whereId($id)->first();//::find($id);//;   -> where('id', $id)  - любые поля
       // return $tarif;
        return TarifResource::make($tarif);
    }
    public function tarifForCurrentUser(){
        $id=Auth::user()->id;
        $user = User::with('tarifUser1')->whereId($id)->first();
       return UserResource::make($user);

       // dd(\Auth::user()->id);
      
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TarifUser::where('tarif_id', $id)->where('user_id', Auth::user()->id)->delete();
        return response()->json(['message'=>'Deleted']);
    }
}
