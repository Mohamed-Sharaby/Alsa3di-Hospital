<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'phone' => 'required|numeric|exists:users,phone'
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
}
