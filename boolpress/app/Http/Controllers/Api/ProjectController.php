<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //


    public function index(Request $request)
    {
        // dd($request->all);
        if ($request->has('search')) {
            $projects = Post::with('type', 'technologies')->where('title', 'LIKE', $request->search . '%')->paginate(15);
        } else {
            $projects = Post::with('type', 'technologies')->paginate(15);
        }
        return response()
            ->json([
                'success' => true,
                'results' => $projects,
            ]);

    }

    public function show(Post $post)
    {
        $post = Post::with('category', 'user', 'tags')->findOrFail($post);

        return response()->json([
            'success' => true,
            'results' => $post
        ]);
    }
}