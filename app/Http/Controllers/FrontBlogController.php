<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
class FrontBlogController extends Controller
{
    //
    public function show($id)
    {
        $blog = Blog::where('id',$id)->first();
        $categories = Category::all();
        return view('blog-single', compact('blog','categories'));

    }
    public function index() {
        $blogs = Blog::orderBy('updated_at','DESC')->join('categories','blogs.category','=','categories.id')->where('blogs.public_status','LIKE', 1)->select(["blogs.*","categories.id as category_id","categories.name as category_name"])->paginate(10);
        $categories = Category::all();
        $activitad_category_name = "新着一覧";
        return view('blogs', compact('blogs','categories','activitad_category_name'));
    }
    public function recommend() {
  
        $blogs=  Blog::join('categories','blogs.category','=','categories.id')->where('blogs.recommended_flag','LIKE',1)->where('blogs.public_status','LIKE', 1)->select(["blogs.*","categories.id as category_id","categories.name as category_name"])->paginate(10);

        $categories = Category::all();
        $activitad_category_name = 'おすすめ';
        return view('blogs', compact('blogs','categories','activitad_category_name'));
    }
    public function category($id) {
        $blogs=  Blog::join('categories','blogs.category','=','categories.id')->where('blogs.category','LIKE',$id)->where('blogs.public_status','LIKE', 1)->select(["blogs.*","categories.id as category_id","categories.name as category_name"])->paginate(10);

        $categories = Category::all();
        $activitad_category_name = Category::where("id" ,"=",$id) ->select(["name"])->get()[0]->name;
        return view('blogs', compact('blogs','categories','activitad_category_name'));
    }
}
