<?php

namespace Modules\RouteManagement\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteManagementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "node_one" => $this->node_one,
            "node_two" => $this->node_two,
            "route_number" => $this->route_number,
            "distance" => $this->distance,
            "time" => $this->time,
        ];
    }
}
