<?php

namespace Modules\ScheduleManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleBookingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array'
     */
    public function rules()
    {
        return [
            'bus_seat_id' => 'required',
            'user_id' => 'required',
            'bus_schedule_id' => 'required',
            'seat_number' => 'required',
            'price' => 'required',
            'status' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
