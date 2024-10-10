<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = Post::latest()->with('user','category')->where(function ($query) use($request){
            if($request->search){
                $query->where('title','like',"%{$request->search}%");
            }
        })->paginate(8);
        $categories = Category::all();
        return view('website.home', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
