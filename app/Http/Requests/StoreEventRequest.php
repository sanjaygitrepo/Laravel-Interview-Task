<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'name' => 'required|min:3|unique:events',
                'location' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'date|after:start_date'
            ];
    }
}
