<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class PostController extends Controller
{
    /**
     * Повертає всі записи блогу з відношеннями user та category
     */
    public function index()
    {
        $posts = BlogPost::with(['user', 'category'])->get();

        return response()->json($posts);
    }
}
