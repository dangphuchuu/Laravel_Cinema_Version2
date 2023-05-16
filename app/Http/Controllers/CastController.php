<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
    public function cast()
    {
        $cast = Cast::all();
        return view('admin.cast.list', ['cast' => $cast]);
    }
    public function getCreate()
    {
        return view('admin.cast.create');
    }
    public function postCreate()
    {
    }
    public function postEdit()
    {
        return view('admin.cast.edit');
    }
}
