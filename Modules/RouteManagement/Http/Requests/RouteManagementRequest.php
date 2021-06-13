<?php

namespace Modules\RouteManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteManagementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'node_one' => 'required',
            'node_two' => 'required',
            'route_number' => 'required',
            'distance' => 'required',
            'time' => 'required',
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
