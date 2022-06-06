<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:191|min:3',
            'email' => 'required|string|email|max:191|unique:users,email',
            'phone' => ['required', 'numeric', 'unique:users,phone', 'regex:/^(9665)[0-9]{8}/'],
            'password' =>' required|min:6|max:191'
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
