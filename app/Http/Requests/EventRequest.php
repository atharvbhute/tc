<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required',
            'organiser' => 'required',
            'address' => 'required',
            'date' => 'required',
            'fees' => 'required',
            'picture' => 'required',
            'description' => 'required',
            'contactNumber' => 'required|min:10|max:11',
        ];
    }
}
