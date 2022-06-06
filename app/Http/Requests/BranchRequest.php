<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'ar_details' => 'nullable|string',
            'en_details' => 'nullable|string',
            'is_active'=>'boolean',
            'address'=>'string',
            'lat'=>'string',
            'lng'=>'string',
            'images'=>'sometimes|array',
        ];
        if ($this->method() == 'PUT')
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048';
        return $rules;
    }
}
