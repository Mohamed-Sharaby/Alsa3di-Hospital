<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'ar_details' => 'required|string',
            'en_details' => 'required|string',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
            'ar_overview' => 'required|string',
            'en_overview' => 'required|string',
            'price_before_discount' => 'nullable|numeric',
            'price' => 'required|numeric',
            'sub_category_id' => 'required|numeric|exists:sub_categories,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            'is_active'=>'boolean',
        ];
        if ($this->method() == 'PUT')
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048';

        return $rules;
    }
}
