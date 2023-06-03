<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function statistical(){
        return view('admin.statistical.list');
    }
}
