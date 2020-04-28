<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'id' => $this->id,
        'account' => $this->account,
        'avatar' => $this->avatar,
        'name' => $this->name,
        'college' => $this->college,
        'class' => $this->class,
        'gra_year' => $this->gra_year,
        'ero_year' => $this->ero_year,
        'phone' => $this->phone,
        'email' => $this->email,
        'age' => $this->age,
        'gender' => $this->gender,
        'city' => $this->city,
        'profession' => $this->profession,
      ];
    }
}
