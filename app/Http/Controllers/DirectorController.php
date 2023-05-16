<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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
        $cloud = Cloudinary::upload($img->getRealPath(), [
            'folder' => 'cinema',
            'format' => 'jpg',

        ])->getPublicId();
        $director = new Director(
            [
                'name' => $request->name,
                'image' => $cloud,
                'birthday' => $request->birthday,
                'national' => $request->national,
                'content' => $request->content
            ]
        );
        $director->save();
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
