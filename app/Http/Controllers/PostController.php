<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function insert(Request $request)
    {
        return Post::create([
            'name' => $request->name,
        ]);
    }
}
