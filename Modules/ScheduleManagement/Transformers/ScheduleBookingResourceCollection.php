<?php

namespace Modules\ScheduleManagement\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleBookingResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => ScheduleBookingResource::collection($this->collection)
        ];
    }
}
