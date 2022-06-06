<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookServiceRequest extends FormRequest
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
            'branch_id' => 'required|exists:branches,id',
            'service_id' => 'required|exists:services,id',
            'phone' => 'required|numeric',
            'details' => 'required|min:5',
            'date' => 'required'
        ];
    }
}
