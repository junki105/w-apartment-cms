<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Post;
use App\Category;
use App\Housing;
use App\Result;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index() {
        $blogs = Blog::all()->take(10);
        $categories = Category::all();
        $blogs = $blogs->concat($categories);
        $blogs=  Blog::join('categories','blogs.category','=','categories.id')->where('blogs.public_status','LIKE', 1)->take(10)->get(["blogs.*","categories.id as category_id","categories.name as category_name"]);
        $houses = Housing::orderBy('updated_at','DESC')->paginate(8);
        $posts = Post::orderBy('updated_at','DESC')->paginate(4);
        $results = Result::orderBy('updated_at','DESC')->paginate(4);
        return view('index', compact('blogs', 'houses', 'posts', 'results'));
    }
}
