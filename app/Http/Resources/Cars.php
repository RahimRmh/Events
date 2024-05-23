<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OfficeResource as officeResource;


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
            'id' => $this->id,
            'Car Name' => $this->model,
            'Rental Price' => $this->price,
            'image' => $this->car_image,
            'office' => new OfficeResource($this->whenLoaded('office')), // Ensure office is included




            
            ]   ; }
}
