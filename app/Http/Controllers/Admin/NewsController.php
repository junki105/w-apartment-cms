<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use DB;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $page_name = 'News';
        // if (Auth::user()->type === 1 || Auth::user()->hasRole('Editor')) {
        //     $news = Post::with(['creator'])->orderBy('id', 'DESC')->get();
        // } else {
        //     $news = Post::with(['creator'])->where('created_by', Auth::user()->id)->orderBy('id', 'DESC')->get();
        // }
         return view('admin.news.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'News Create Page';
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title, '-');
        $post->content = $request->content;
        $post->status = $request->status;
        $post->image = $request->image;
        $post->save();

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $main_image = 'post_main_' . $post->id . '.' . $extension;
        $thumb_image = 'post_thumb_' . $post->id . '.' . $extension;
        $list_image = 'post_list_' . $post->id . '.' . $extension;
        Image::make($file)->resize(653, 569)->save(public_path('post/' . $main_image));
        Image::make($file)->resize(360, 309)->save(public_path('post/' . $thumb_image));
        Image::make($file)->resize(122, 122)->save(public_path('post/' . $list_image));
        $post->main_image = $main_image;
        $post->thumb_image = $thumb_image;
        $post->list_image = $list_image;
        $post->save();

        return redirect(route('admin.post.list'))->with('success', 'Post Created Successfully');
    }


}
