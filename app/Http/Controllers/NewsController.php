<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index() {
        $news = $this->news->orderBy('id', 'DESC')->paginate(6);

        return view('pages.news.index', compact('news'));
    }

    public function detail($slug)
    {
        $news = $this->news->where('slug', $slug)->first();

        return view('pages.news.detail', compact('news'));
    }
}
