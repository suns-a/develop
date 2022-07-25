<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewPost;

class NewPostController extends Controller
{
    public function index(Request $request)
    {
        $new_posts = NewPost::paginate(5);
        if ($request->ajax()) {
            $view = view('data', compact('new_posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('newPost', compact('new_posts'));
    }
}
