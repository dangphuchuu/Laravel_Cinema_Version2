<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Transformation\Resize;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Transformation\Format;
//use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Cloudinary;
use Illuminate\Contracts\Filesystem\Cloud;

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
        $cloudinary = new Cloudinary(
            [
                'cloud' => [
                    'cloud_name' => 'dgk9ztl5h',
                    'api_key'    => '945974289843947',
                    'api_secret' => '9bEXv8Aoc9QY_CzjcOTrQrGlBHo',
                ],
            ]
        );
        $cloud = $cloudinary->uploadApi()->upload($img->getRealPath());
        dd($cloud->storage());
        // $cloud = Cloudinary::upload($img->getRealPath())->getPublicId();
        // $clouinary = new Cloudinary();
        // $clouinary->image($cloud)
        //     ->delivery(Format::JPG);
        // $director = new Director(
        //     [
        //         'name' => $request->name,
        //         'image' => $cloud,
        //         'birthday' => $request->birthday,
        //         'national' => $request->national,
        //         'content' => $request->content
        //     ]
        // );

        // $director->save();

        return redirect('admin/director')->with('success', 'Add Director Successfully!');
    }
    public function postEdit()
    {
        return view('admin.director.edit');
    }
    public function delete($id)
    {
        $director = Director::find($id);
        Cloudinary::destroy($director['image']);
        $director->delete();
        return redirect('admin/director')->with('success', 'Add Director Successfully!');
    }
}
