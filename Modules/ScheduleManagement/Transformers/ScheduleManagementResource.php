<?php

namespace Modules\ScheduleManagement\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleManagementResource extends JsonResource
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
            "bus_route_id" => $this->bus_route_id,
            "direction" => $this->direction,
            "start_timestamp" => $this->start_timestamp,
            "end_timestamp" => $this->end_timestamp
        ];
    }
}
