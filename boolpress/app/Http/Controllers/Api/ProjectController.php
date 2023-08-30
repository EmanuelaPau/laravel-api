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
        $projects = Post::all();
        return response()
            ->json([
                'success' => true,
                'results' => $projects,
            ]);
    }
}