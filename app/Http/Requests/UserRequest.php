<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:users,name',
            'email' => 'required|email|max:100|unique:users,email',
            'phone' => 'required|numeric|phone:EG,SA|unique:users,phone',
            'password' => 'required|confirmed|min:6',
            'role' => 'nullable|in:doctor,patient',
            'is_active' => 'boolean',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',

//            'ar_job' => 'required_if:role,doctor|string|max:191',
//            'en_job' => 'required_if:role,doctor|string|max:191',
//            'ar_details' => 'required_if:role,doctor|string|max:191',
//            'en_details' => 'required_if:role,doctor|string|max:191',
//            'ar_lang' => 'required_if:role,doctor|string|max:191',
//            'en_lang' => 'required_if:role,doctor|string|max:191',
//            'ar_clinic' => 'required_if:role,doctor|string|max:191',
//            'en_clinic' => 'required_if:role,doctor|string|max:191',
//            'appointment_price' => 'required_if:role,doctor',
//            'consult_price' => 'required_if:role,doctor',
//            'price' => 'required_if:role,doctor',
//            'detection_time' => 'required_if:role,doctor',
//            'user_id' => 'required_if:role,doctor|numeric|exists:users,id',
//            'branch_id' => 'required_if:role,doctor|numeric|exists:branches,id',
//            'specialization_id' => 'required_if:role,doctor|numeric|exists:specializations,id',
//            'work_from' => 'required_if:role,doctor',
//            'work_to' => 'required_if:role,doctor',
//            'vacations' => 'required_if:role,doctor|array',
//            'is_distinct'=>'boolean'
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => 'required|string|max:100|unique:users,name,' . $this->user,
                'email' => 'required|email|max:100|unique:users,email,' . $this->user,
                'phone' => 'required|numeric|phone:EG,SA|unique:users,phone,' . $this->user,
                'password' => 'nullable|confirmed|min:6',
                'role' => 'nullable|in:doctor,patient',
                'is_active' => 'boolean',
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
            ];
        }
        return $rules;
    }

    public function validated()
    {
        $data = parent::validated(); // TODO: Change the autogenerated stub
        $data['role'] = 'patient';
        return $data;
    }
}
