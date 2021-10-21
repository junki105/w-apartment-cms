<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'author_name' => 'required'
        ]);
         request()->validate([
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);
         request()->validate([
            'author_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->public_status = $request->public_status;
        $blog->author_name = $request->author_name;
        $blog->author_profile = $request->author_profile;
        $blog->category = $request->category;
        if($request->recommended_flag=='on'){
            $blog->recommended_flag = true;
        }
        else{
            $blog->recommended_flag = false;
        }
        if($file = $request->file('featured_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blogs/featured-image');
            if($file->move($target_path, $name)) {
               $blog->featured_image_url = '/uploads/blogs/featured-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        if($file = $request->file('author_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blogs/author-image');
            if($file->move($target_path, $name)) {
               $blog->author_image_url = '/uploads/blogs/author-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        $blog->save();
        $url = url('/blogs/'.$blog->id);
        return response()->json(['success'=>true,'url'=>$url,'id'=>$blog->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        $blogs = Blog::latest()->paginate(5);
        $count = Blog::count();
        $categories = Category::all();
        return view('admin.blogs.list',compact(['blogs','count','categories']));
    }
    public function search(Request $request)
    {
        $search_word = $request->search_word?:'';
        $author_name = $request->author_name?:'';
        $public_status = $request->public_status?:'';
        $category_array = $request->category_array ?:array();
        $public_status = $request->public_status?:'';
        $recommended_flag = $request->recommended_flag?:'';
        $blogs = Blog::where("title","LIKE","%$search_word%")
                        ->orwhere("content","LIKE","%$search_word%")
                        ->where('author_name',"=",$author_name)
                        ->whereIn('category',$category_array)
                        ->where('recommended_flag',"=",$recommended_flag)
                        ->paginate(5);
        $count = Blog::where("title","LIKE","%$search_word%")
                        ->orwhere("content","LIKE","%$search_word%")
                        ->where('author_name',"=",$author_name)
                        ->whereIn('category',$category_array)
                        ->where('recommended_flag',"=",$recommended_flag)
                        ->count();
        $categories = Category::all();
            //                 ])->count();
        // $blogs = DB::table('blogs')->when($search_word,function($query,$search_word){
        //                                     return $query->where('title',"LIKE","%$search_word%")
        //                                                 ->orwhere('content',"LIKE","%$search_word%");
        //                                 })->when($author_name,function($query,$author_name){
        //                                     return $query->where('author_name',"LIKE","%$author_name%");
        //                                 })->when($public_status,function($query,$public_status){
        //                                     return $query->where('public_status','=',$public_status);
        //                                 })->paginate(5);
        // if($request->public_status!=null){
        //     if($request->search_word !=null){
        //         $blogs = Blog::where([
        //                     ["title","LIKE","%$request->search_word%"],
        //                     ['public_status','=',$request->public_status]
        //                 ])->orwhere([
        //                     ["content","LIKE","%$request->search_word%"],
        //                     ['public_status','=',$request->public_status]
        //                 ])->paginate(5);
        //         $count = Blog::where([
        //                     ["title","LIKE","%$request->search_word%"],
        //                     ['public_status','=',$request->public_status]
        //                 ])->orwhere([
        //                     ["content","LIKE","%$request->search_word%"],
        //                     ['public_status','=',$request->public_status]
        //                 ])->count();
        //     }
        //     else{
        //         $blogs = Blog::where('public_status',"=",$request->public_status)->latest()->paginate(5);
        //         $count = Blog::where('public_status',"=",$request->public_status)->count();
        //     }
        // }
        // else{
        //     if($request->search_word !=null){
        //         $blogs = Blog::where("title","LIKE","%$request->search_word%")
        //                 ->orwhere("content","LIKE","%$request->search_word%")->paginate(5);
        //         $count = Blog::where("title","LIKE","%$request->search_word%")
        //                 ->orwhere("content","LIKE","%$request->search_word%")->count();
        //     }
        //     else{
        //         $blogs = Blog::latest()->paginate(5);
        //         $count = Blog::count();
        //     }
        // }
        return response()->json(['success'=>true,'blogs'=>$blogs,'categories'=>$categories,'count'=>$count]);
    }
    public function category(){
        $categories = Category::all();
        return view('admin.blogs.category',compact('categories'));
    }
    public function categoryAdd(Request $request){
        $category  = new Category;
        $category->name = $request->new_category_name;
        $category->save();
        return response()->json(['success'=>true,'category'=>$category]);
    }
    public function categoryUpdate(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->new_category_name;
        $category->save();
        return response()->json(['success'=>true,'name'=>$category->name]);
    }
    public function categoryDelete(Request $request,$id){
        Category::find($id)->delete();
        return response()->json(['success'=>true]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::where('id',$id)->first();
        $categories = Category::all();
        return view('admin.blogs.edit',compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->public_status = $request->public_status;
        $blog->author_name = $request->author_name;
        $blog->author_profile = $request->author_profile;
        $blog->category = $request->category;
        if($request->recommended_flag=='on'){
            $blog->recommended_flag = '1';
        }
        else{
            $blog->recommended_flag = '0';
        }
        if($file = $request->file('featured_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blogs/featured-image');
            if($file->move($target_path, $name)) {
               $blog->featured_image_url = '/uploads/blogs/featured-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $blog->featured_image_url = $blog->featured_image_url;
        }
        if($file = $request->file('author_image')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/blogs/author-image');
            if($file->move($target_path, $name)) {
               $blog->author_image_url = '/uploads/blogs/author-image/'.$name;//If image saved success, image_url is assigned
            }
        }
        else{
            $blog->author_image_url = $blog->author_image_url;
        }
        $blog->save();
        return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Blog::find($id)->delete();
        return response()->json(['success'=>true]);
    }
}
