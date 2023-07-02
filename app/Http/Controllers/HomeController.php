<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $posts = Post::all();
                return view('post.index', compact('posts'));
            } else if ($usertype == 'admin') {
                return view('admin.adminHome');
            } else {
                return redirect()->back();
            }
        }
    }
}
