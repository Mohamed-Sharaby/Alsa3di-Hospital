<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MedicalFileCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'items' => $this->collection->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'doctor_name' => $item->doctor->user->name ?? '',
                    'specialization' => $item->specialization->name ?? '',
                    'appointment' => $item->date ?? '',
                    'attaches' => $item->files()->get()->map(function ($attach) {
                        return ['attach' => $attach->file_path];
                    })->pluck('attach'),
                ];
            }),
            'paginate' => [
                'total' => $this->total(),
                'currentPage' => $this->currentPage(),
                'count' => $this->count(),
                'lastPage' => $this->lastPage(),
                'nextPageUrl' => $this->nextPageUrl(),
                'previousPageUrl' => $this->previousPageUrl(),
                'perPage' => $this->perPage(),
            ]
        ];
    }
}
