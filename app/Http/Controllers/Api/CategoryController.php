<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\ApiResponses;
use App\Models\Category;
use App\Services\AdService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponses;

    protected $ad_service;

    public function __construct(AdService $service)
    {
        $this->ad_service = $service;
    }

    public function categories($id = null)
    {
        if ($id) return $this->apiResponse(CategoryResource::collection(Category::whereParentId($id)->get()));
        return $this->apiResponse(CategoryResource::collection(Category::main()->get()));
    }

    public function ads(Request $request,$id)
    {
        $data = $request->all();
        $data['subcategory'] = $id;
        return $this->apiResponse(new AdCollection($this->ad_service->handle($data)));
    }

    public function search(Request $request)
    {
        $data = $request->all();
        return $this->apiResponse(new AdCollection($this->ad_service->handle($data)));
    }
}
