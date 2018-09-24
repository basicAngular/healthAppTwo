<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\BlogTag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        
    }

    public function addTag(Request $request)
    {
        $addTag = new BlogTag;
        $addTag->tag = $request->tag;
        $addTag->save();
        return response()->json(['status' => 'success']);
    }
    // add category
    public function addCategory(Request $request)
    {
        $addCategory = new BlogCategory;
        $addCategory->category = $request->category;
        $addCategory->save();
        return response()->json(['status' => 'success']);
    }
    // add blog
    public function addBlog(Request $request)
    {
        $blog = new Blog ;
        $blog->url = 'url';
        $blog->title = $request->title;
        $blog->content = $request->blogContent;
        $blog->category_id = $request->blogCategory;
        $blog->image = 'images';
        $blog->save();
        return response()->json(['status' => 'success']);
    }

    public function category()
    {
        $category = BlogCategory::all();
        if(empty($category)){
            return response()->json(['status' => 'No Data found'],401);
        }
        else{
            return response()->json(['status' => 'success', 'result'=>$category]);
        }
    }

    public function tag()
    {
        $tag = BlogTag::all();
        if(empty($tag)){
            return response()->json(['status' => 'No Data found'],401);
        }
        else{
            return response()->json(['status' => 'success', 'result'=>$tag]);
        }
    }
    public function blog() {
        $posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');
        $data['posts'] = $posts;
        return view('blog', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '',
            'page' => 'blog',
            'brands' => $this->brands,
            'categories' => $this->categories,
            'products' => $this->products)
        );
    }

    public function blog_post($url) {
        $post = Post::whereUrl($url)->first();
        $tags = $post->tags;
        $prev_url = Post::prevBlogPostUrl($post->id);
        $next_url = Post::nextBlogPostUrl($post->id);
        $title = $post->title;
        $description = $post->description;
        $page = 'blog';
        $brands = $this->brands;
        $categories = $this->categories;
        $products = $this->products;
        $data = compact('prev_url', 'next_url', 'tags', 'post', 'title', 'description', 'page', 'brands', 'categories', 'products');

        return view('blog_post', $data);
    }
}
