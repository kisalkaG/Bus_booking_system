<?php

namespace Modules\ScheduleManagement\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleBookingResource extends JsonResource
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
            "bus_seat_id" => $this->bus_seat_id,
            "user_id" => $this->user_id,
            "bus_schedule_id" => $this->bus_schedule_id,
            "seat_number" => $this->seat_number,
            "price" => $this->price,
            "status" => $this->status
        ];
    }
}
