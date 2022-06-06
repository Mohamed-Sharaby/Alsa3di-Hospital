<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::with('subCategories')->get();
        return inertia('Store/Index', $data);
    }

    public function products(Request $request)
    {
        $products = $this->filterProducts($request->all());
        return response_json(true, $products);
    }


    public function product(Product $product)
    {
        $product->load('images');
        $similar_products = Product::where([['sub_category_id', $product->sub_category_id], ['id', '<>', $product->id]])
                                   ->inRandomOrder()->limit(3)->get();
        return inertia('Store/Product', ['item' => $product, 'similar_products' => $similar_products]);
    }

    public function filterProducts($data)
    {
        $products = Product::query();
        if (isset($data['word']) && !is_null($data['word'])) {
            $products = $products->where(function ($q) use ($data) {
                $q->where('ar_name', 'like', "%{$data['word']}%")->orWhere('en_name', 'like', "%{$data['word']}%");
            });
        }

        if (isset($data['sub_category_id']) && !is_null($data['sub_category_id'])) {
            $products = $products->where('sub_category_id', $data['sub_category_id']);
        }

        if (isset($data['min']) && !is_null($data['min'])) {
            $products = $products->where('price', '>=', $data['min']);
        }

        if (isset($data['max']) && !is_null($data['max'])) {
            $products = $products->where('price', '<=', $data['max']);
        }

        if (isset($data['recent']) && !is_null($data['recent'])) {
            $products = $products->whereDate('created_at', '>=', Carbon::now()->subDays($data['recent']));
        }

        $sort = (isset($data['sort']) && !is_null($data['sort'])) ? $data['sort'] : 'asc';
        $products = $products->orderBy('price', $sort)->paginate(12);

        return $products;
    }


}
