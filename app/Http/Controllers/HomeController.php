<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Housing;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::all()->take(10);
        $categories = Category::all();
        $blogs = $blogs->concat($categories);
        $blogs=  Blog::join('categories','blogs.category','=','categories.id')->take(10)->get(["blogs.*","categories.id as category_id","categories.name as category_name"]);
        $houses = Housing::latest()->paginate(8);
        return view('index', compact('blogs', 'houses'));
    }
}
