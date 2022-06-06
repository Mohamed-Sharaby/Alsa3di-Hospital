<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'details' => $this->details,
            'address' => $this->address,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'image' => $this->image_path,
            'doctors' => $this->distinct_doctors()->with('user')->limit(4)->get()->map(function ($doctor) {
                return [
                    'id' => $doctor->id,
                    'image' => $doctor->user->image_path,
                    'name' => $doctor->user->name,
                    'job' => $doctor->job
                ];
            }),
            'images' => $this->images()->get()->pluck('image_path')
        ];
    }
}
