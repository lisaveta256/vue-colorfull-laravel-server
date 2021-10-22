<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TarifResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* foreach($this->tarifUser as $one){
            $key = $one->user_id;
             $user_ids[$key]=$one->user->email;
        }*/
        return [
            'id'=>$this->id,
            'name'=>$this->name,
           //'description'=>e($this->description),
            'description'=>$this->description,
            'price'=>$this->price,
            'user_info'=>TarifUserInfoResource::collection($this->tarifUser),
            'tarif_info'=>TarifInfoResource::collection($this->info)
        ];
    }
}
