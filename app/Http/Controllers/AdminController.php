<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
    }

    public function home()
    {
        return view('admin.home.home');
    }
}
