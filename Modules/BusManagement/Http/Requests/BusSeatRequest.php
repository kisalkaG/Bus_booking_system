<?php

namespace Modules\BusManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusSeatRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bus_id' => 'required',
            'seat_number' => 'required',
            'price' => 'required'
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
