<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Cloudinary\Transformation\Format;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

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
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => 'dbddwzgho',
                'api_key'    => '936271816677711',
                'api_secret' => 'ganXE2LZyH2T6RpN10-4oqPyhJI',
            ],
        ]);
        $cloud = $cloudinary->uploadApi()->upload($img->getRealPath())->getArrayCopy()['public_id'];
        dd($cloud);
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
