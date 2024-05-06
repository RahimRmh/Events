<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class reservation extends JsonResource
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
            'User' => $this->user->name,
            'Hall' =>$this->hall->name,
            // 'Car' =>$this->car->model,
            'Reservation Time' =>$this->time,
            'Reservation Date' =>$this->Date,
            'Status Of Reservation ' => $this->status,
            'Total Price' => $this->Total_Price,
            'notes' => $this->notes,
        ];
    }
}