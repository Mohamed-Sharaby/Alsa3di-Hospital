<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationCollection extends ResourceCollection
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
                    'data' => $item->data,
                    'created_at' => $item->created_at->diffForHumans(),
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
