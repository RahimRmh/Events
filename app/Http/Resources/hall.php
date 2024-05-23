<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\hallimages as HallImagesResource;


class hall extends JsonResource
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
             'id' =>$this->id,
            'Name Of Hall' => $this->name,
            'Capacity' => $this->capacity,
            'Hall Location' => $this->location,
            'Rental Cost' => $this->price,
            'Hall Description' => $this->description,
            'category' => $this->category,
            'hall_image' => $this->hall_image,
            'images' => HallImagesResource::collection($this->images)   ,
        ];
    }
}
