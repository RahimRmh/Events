<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cars extends JsonResource
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

            'Car Name' => $this->model,
            'Rental office' => $this->office->name,
            'Rental Price' => $this->price,
            'image' => $this->car_image,



    
            ]   ; }
}
