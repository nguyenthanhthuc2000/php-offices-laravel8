<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        if($news) {
            $listNews = $this->news->whereNotIn('id', [$news->id])->orderBy('id', 'DESC')->take(10)->get();
            return view('pages.news.detail', compact('news', 'listNews'));
        }
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $news = $this->news->where('id', $id)->first();
        if($news) {
            return view('pages.news.edit', compact('news'));
        }
        return redirect()->route('home');
    }

    public function create() {

        return view('pages.news.create');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'title' => 'required|max:150',
            'contents' => 'required',
            'image' => 'required',
        ]);

        $request->all();

        $code = substr(md5(microtime()),rand(0,5), 7);
        $image = $code.$request->file('image')->getClientOriginalName();
        $request->file('image')->move('upload/', $image);
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title.'-'.$code),
            'content' => $request->contents,
            'image' => $image
        ];

        if($this->news->create($data)) {

            return redirect()->route('news.index')->with('success_message', 'Thêm thành công!');
        }
        return redirect()->back()->with('error_message', 'Thêm thất bại!');

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'title' => 'required|max:150',
            'contents' => 'required',
        ]);

        $request->all();
        $news = $this->news->find($id);
        if($news) {
            $code = $news->code;
            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title.'-'.$code),
                'content' => $request->contents,
            ];
            if($request->hasFile('image')){
                $image = $code.$request->file('image')->getClientOriginalName();
                $request->file('image')->move('upload/', $image);
                $data = $data + array('image' => $image);
            }
            if($this->news->where('id', $id)->update($data)) {
                return redirect()->route('news.index')->with('success_message', 'Update thành công!');
            }
            return redirect()->back()->with('error_message', 'Update thất bại!');
        }
        return redirect()->back()->with('error_message', 'Không tìm thấy bài viết!');
    }

    public function delete($id) {

        if($this->news->find($id)) {
            $this->news->where('id', $id)->delete();
            return redirect()->route('news.index')->with('success_message', 'Xóa thành công!');
        }
        return redirect()->back()->with('error_message', 'Xóa thất bại!');
    }
}
