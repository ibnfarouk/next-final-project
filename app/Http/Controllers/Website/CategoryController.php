<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $theCategory = Category::findOrFail($id);
        $posts = $theCategory->posts()->latest()->with('user','category')->where(function ($query) use($request){
            if($request->search){
                $query->where('title','like',"%{$request->search}%");
            }
        })->paginate(8);
        $categories = Category::all();
        return view('website.category', [
            'posts' => $posts,
            'categories' => $categories,
            'theCategory' => $theCategory,
        ]);
    }
}
