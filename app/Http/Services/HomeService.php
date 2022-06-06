<?php

namespace App\Http\Services;

use App\Http\Services\Repository\AboutRepository;
use App\Models\About;
use App\Models\Offer;

class HomeService
{
    protected $aboutRepository;

    public function __construct(AboutRepository $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function handle($request)
    {
        return [
            'offers' => Offer::latest()->limit(6)->whereIsActive(1)->get()->transform(function ($item) {
                        return [
                            'id' => $item->id,
                            'image' => $item->image_path,
                        ];
                    })
        ];
    }

    public function about()
    {
        $about = $this->aboutRepository->first()->only([
            'title', 'details', 'author', 'job', 'author_details', 'vision', 'message', 'goals', 'brief', 'image_path'
        ]);
        return $about;
    }

}