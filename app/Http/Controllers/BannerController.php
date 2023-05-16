<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function banners()
    {
        $banners = Banner::all();
        return view('admin.banners.list', ['banners' => $banners]);
    }
}
