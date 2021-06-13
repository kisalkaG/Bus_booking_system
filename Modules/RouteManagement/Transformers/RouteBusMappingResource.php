<?php

namespace Modules\RouteManagement\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteBusMappingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bus_id' => $this->bus_id,
            'route_id' => $this->route_id,
            'status' => $this->status
        ];
    }
}
