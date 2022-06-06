<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users,email,'.auth('api')->id(),
            'phone' => 'required|numeric|regex:/^(9665)[0-9]{8}/|unique:users,phone,'.auth('api')->id(),
        ];
    }

    public function prepareForValidation()
    {
        if(isset($this->phone)) {
            $this->merge([
                'phone' => preparePhoneNumber($this->phone)
            ]);
        }
    }

    public function messages()
    {
        return [
            'phone.regex' => __('Phone must be saudi number')
        ];
    }
}
