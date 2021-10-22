<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TarifInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'tarif_id'=>$this->tarif_id,
           //'description'=>e($this->description),
          //  'short_description'=>$this->short_description,
            'links'=>$this->links,
            //'info'=>$this->info
        ];
    }
}
