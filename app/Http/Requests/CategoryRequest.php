<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'is_active'=>'boolean',
        ];
        if ($this->method() == 'PUT')
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048';
        return $rules;
    }
}
