<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $rules = [
            'ar_name' => 'required|string|max:191',
            'en_name' => 'required|string|max:191',
            'ar_details' => 'nullable|string',
            'en_details' => 'nullable|string',
            'is_active' => 'boolean',
            'price' => 'nullable',
            'branch_id' => 'required|numeric|exists:branches,id',
            'specialization_id' => 'required|numeric|exists:specializations,id'
        ];

        return $rules;
    }
}
