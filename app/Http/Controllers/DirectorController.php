<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function director()
    {
        $director = Director::all();
        return view('admin.director.list', ['director' => $director]);
    }
    public function getCreate()
    {
        return view('admin.director.create');
    }
    public function postCreate()
    {
    }
    public function postEdit()
    {
        return view('admin.director.edit');
    }
}
