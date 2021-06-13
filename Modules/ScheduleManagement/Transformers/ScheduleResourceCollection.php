<?php

namespace Modules\ScheduleManagement\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleResourceCollection extends ResourceCollection
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
            'data' => ScheduleManagementResource::collection($this->collection)
        ];
    }
}
