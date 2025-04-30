<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetController extends Controller
{
    public function index(){
        $posts = Post::latest()->take(6)->get();
        return view('app', compact('posts'));
    }

    public function dashboard(){
        $user = Auth::user();
        $posts = $user ? $user->posts : collect();

        return view('dashboard', compact('posts'));
    }
    public function chatbot(){
        return view('components.chatbot');
    }
    
}
