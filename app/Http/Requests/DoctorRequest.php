<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'phone' => 'required|numeric|phone:EG,SA|unique:users,phone',
            'password' => 'required|confirmed|min:6',
            'role' => 'nullable|in:doctor,patient',
            'is_active' => 'boolean',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',

            'ar_job' => 'required|string|max:191',
            'en_job' => 'required|string|max:191',
            'ar_details' => 'required|string',
            'en_details' => 'required|string',
            'ar_lang' => 'required|string|max:191',
            'en_lang' => 'required|string|max:191',
            'ar_clinic' => 'required|string|max:191',
            'en_clinic' => 'required|string|max:191',
            'appointment_price' => 'required',
            'consult_price' => 'required',
            'price' => 'required',
            'detection_time' => 'required',
            'user_id' => 'nullable|numeric|exists:users,id',
            'branch_id' => 'required|numeric|exists:branches,id',
            'specialization_id' => 'required|numeric|exists:specializations,id',
            'work_from' => 'required',
            'work_to' => 'required',
            'vacations' => 'required|array',
            'is_distinct'=>'boolean',
            'service_id'=>'required|array'
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => 'required|string|max:100'  ,
                'email' => 'required|email|max:100|unique:users,email,' . $this->user->id,
                'phone' => 'required|numeric|phone:EG,SA|unique:users,phone,' . $this->user->id,
                'password' => 'nullable|confirmed|min:6',
                'role' => 'nullable|in:doctor,patient',
                'is_active' => 'boolean',
                'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',

                'ar_job' => 'required|string|max:191',
                'en_job' => 'required|string|max:191',
                'ar_details' => 'required|string',
                'en_details' => 'required|string',
                'ar_lang' => 'required|string|max:191',
                'en_lang' => 'required|string|max:191',
                'ar_clinic' => 'required|string|max:191',
                'en_clinic' => 'required|string|max:191',
                'appointment_price' => 'required',
                'consult_price' => 'required',
                'price' => 'required',
                'detection_time' => 'required',
                'user_id' => 'nullable|numeric|exists:users,id',
                'branch_id' => 'required|numeric|exists:branches,id',
                'specialization_id' => 'required|numeric|exists:specializations,id',
                'work_from' => 'required',
                'work_to' => 'required',
                'vacations' => 'required|array',
                'is_distinct'=>'boolean',
                'service_id'=>'required|array'
            ];
        }
        return $rules;
    }

    public function validated()
    {
        $data = parent::validated(); // TODO: Change the autogenerated stub
        $data['role'] = 'doctor';
        return $data;
    }
}
