<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {

        return Parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->when(in_array('name', $fields) || $fields === [], $this->name),
            'birth_date' => $this->when(in_array('birth_date', $fields) || $fields === [], $this->birth_date),
            'death_date' => $this->when(in_array('death_date', $fields) || $fields === [], $this->death_date),
            'nationality_id' => $this->when(in_array('nationality_id', $fields) || $fields === [], $this->nationality_id),
        ];
    }

}
