<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'code' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'id_recipe' => $this->id_recipe,
            'name_recipe' => $this->name,
            'status_recipe' => $this->status_recipe

        ];
    }
}
