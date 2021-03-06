<?php

namespace Modules\BusManagement\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class BusManagementResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "type" => $this->type,
            "vehical_number" => $this->vehical_number
        ];
    }
}
