<?php

namespace Modules\BusManagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusManagementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"=> 'required',
            "type"=> 'required',
            "vehical_number"=> 'required|unique:buses',

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
