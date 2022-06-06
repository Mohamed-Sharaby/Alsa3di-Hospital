<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'type' => 'required',
            'phone' => 'required|numeric',
            'details' => 'nullable|string|max:191',
            'price' => 'nullable',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'branch_id' => 'required_if:type,service|required_if:type,appointment|numeric|exists:branches,id',
            'doctor_id' => 'required_if:type,chat|required_if:type,consult|required_if:type,appointment|numeric|exists:doctors,id',
            'specialization_id' => 'required_if:type,!=,service|numeric|exists:specializations,id',
            'service_id' => 'nullable|numeric|exists:services,id',
            'appointment_id' => 'required_if:type,appointment|numeric|exists:appointments,id',
            'status' => 'required|in:new,confirmed,refused,ignored,cancelled',

        ];

        return $rules;
    }

}
