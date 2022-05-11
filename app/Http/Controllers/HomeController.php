<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $news;
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index () {

        $news = $this->news->orderBy('id', 'DESC')->paginate(8);
        return view('pages.index', compact('news'));
    }
}
