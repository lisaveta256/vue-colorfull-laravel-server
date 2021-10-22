<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TarifUser;
use App\Models\Tarif;
use App\Http\Resources\TarifResource;
use Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $last_tarif_user = TarifUser::whereUserId($this->id)->orderBy('updated_at','DESC')->first();
        $user_tarifs_arr_id = TarifUser::whereUserId($this->id)->pluck('tarif_id');
        $tarifs = Tarif::whereIn('id', $user_tarifs_arr_id)->get();
      //  dd($last_tarif_user);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'last_tarif_name'=>optional(optional($last_tarif_user)->tarif)->name,
            'updated_at'=>optional($last_tarif_user)->updated_at,
           // 'tarifs'=>$this->tarifUser1
            'tarifs'=>TarifShortDescriptionResource::collection($tarifs),
            'acccount'=>AccountResource::make($this->account)
        ];
    }
}
