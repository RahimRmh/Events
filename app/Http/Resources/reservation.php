<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\dishes as DishesReservation;
use App\Http\Resources\time as timeReservation;
use App\Http\Resources\hall as hallReservation;


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
            'id' =>$this->id,
            'Hall Name' =>   $this->hall->name,
            'Hall Id' =>   $this->hall->id,
            'Car Name' =>$this->car->model,
            'Car Id' =>$this->car->id,
            'Reservation Time' => new timeReservation($this->time)  ,
            'Reservation Date' =>$this->Date,
            'Status Of Reservation ' => $this->status,
            'Total Price' => $this->Total_Price,
            'dishes' => DishesReservation::collection($this->dishes),
        ];
    }
}
