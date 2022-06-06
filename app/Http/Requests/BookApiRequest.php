<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookApiRequest extends FormRequest
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
            'phone' => 'required|numeric|regex:/^(9665)[0-9]{8}/',
            'type' => 'required|string|in:appointment,consult,service,chat',
            'branch_id' => 'sometimes|exists:branches,id',
            'specialization_id' => 'required_unless:type,service|exists:specializations,id',
            'doctor_id' => 'required_unless:type,service|exists:doctors,id',
            'details' => 'required_unless:type,appointment|min:5',
            'date' => 'required_unless:type,appointment',
            'appointment_id' => 'required_if:type,appointment|exists:appointments,id',
            'service_id' => 'required_if:type,service|exists:services,id',
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
