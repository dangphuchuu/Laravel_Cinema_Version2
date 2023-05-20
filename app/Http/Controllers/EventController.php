<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function events()
    {
        $post = Post::all();
        return view('admin.events.list', ['post' => $post]);
    }

    public function postCreate()
    {
        return view('admin.events.create');
    }

    public function postEdit()
    {
        return view('admin.events.edit');
    }
}
