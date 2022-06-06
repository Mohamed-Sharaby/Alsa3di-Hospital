<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Specialization;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::latest();

        if (!is_null($request->specialty)) {
            $news = $news->whereSpecializationId($request->specialty);
        }

        if (!is_null($request->word)) {
            $news = $news->where(fn ($q) =>
                $q->where('ar_title', 'like', "%{$request->word}%")->orWhere('en_title', 'like', "%{$request->word}%")
            );
        }
        $news = $news->paginate(20);
        $specializations = Specialization::all()->map(function ($item) { return ['id' => $item->id, 'name' => $item->name]; });
        return inertia('News/Index', [
            'items' => $news,
            'specializations' => $specializations,
            'filters' => ['word' => $request->word, 'specialty' => $request->specialty]
        ]);

    }

    public function show(News $news)
    {
        $news->load('views');
        $news->since_date = $news->created_at->diffForHumans();
        $news->views()->firstOrCreate(['ip' => \request()->ip()]);
        $similar_news = News::where('specialization_id', $news->specialization_id)->where('id', '<>', $news->id)->limit(3)->get();
        return inertia('News/Show', ['item' => $news, 'similar_news' => $similar_news]);
    }
}
