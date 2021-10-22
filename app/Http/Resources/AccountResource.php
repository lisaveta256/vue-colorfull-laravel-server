<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'user_id'=>$this->user_id,
            'country_id'=>$this->country_id,
            //'country_name'=>$this->country->country_name,
            'city'=>$this->city,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'bio'=>$this->bio,
            'picture'=>$this->picture
        ];
    }
}
