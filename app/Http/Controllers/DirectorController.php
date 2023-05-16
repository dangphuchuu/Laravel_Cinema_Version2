<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Configuration\Configuration;

class DirectorController extends Controller
{
    public function director()
    {
        $director = Director::all();
        return view('admin.director.list', ['director' => $director]);
    }
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name is required',
        ]);
        $file = $request->file('Image');
        $img = $request['image'] = $file;
        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dgk9ztl5h',
                'api_key' => '945974289843947',
                'api_secret' => '9bEXv8Aoc9QY_CzjcOTrQrGlBHo'
            ],
            'url' => [
                'secure' => false
            ]
        ]);
        (new UploadApi())->upload('images/rated/C13.png');
    }
    public function postEdit()
    {
        return view('admin.director.edit');
    }
}
