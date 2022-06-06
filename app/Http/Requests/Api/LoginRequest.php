<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|string|max:191',
            'password' => 'required|max:191'
        ];
    }

    public function prepareForValidation()
    {
        if(isset($this->username) && !filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
            $this->merge([
                'username' => preparePhoneNumber($this->username)
            ]);
        }
    }
}
