<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
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
                return new BookResource($item);
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
