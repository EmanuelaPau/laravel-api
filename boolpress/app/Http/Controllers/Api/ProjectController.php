<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Post::with('category', 'tags')->paginate(15);
        return response()
            ->json([
                'success' => true,
                'results' => $projects,
            ]);
    }
}