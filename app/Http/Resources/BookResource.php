<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'type_trans' => $this->type_lang,
            'phone' => $this->phone,
            'doctor_name' => $this->doctor->user->name ?? '',
            'doctor_id' => (string) $this->doctor_id ?? '',
            'specialization' => $this->specialization->name ?? '',
            'branch' => $this->branch->name ?? '',
            'service' => $this->service->name ?? '',
            'date_trans' => $this->date ? $this->date->format('d M') : ($this->appointment ? $this->appointment->day->locale('ar')->format('d M') : ''),
            'date' => $this->date ?? '',
            'appointment' => $this->appointment()->exists() ? [
                'day' => $this->appointment->day->format('Y-m-d'),
                'timeslot' => $this->appointment->timeslot,
            ] : null,
            'details' => $this->details ?? '',
            'status' => $this->status,
            'status_trans' => $this->status_lang,
            'payment' => $this->payment ?? 'cash',
            'price' => (string) $this->price,
        ];
    }
}
