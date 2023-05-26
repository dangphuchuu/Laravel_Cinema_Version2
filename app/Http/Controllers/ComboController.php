<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Food;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ComboController extends Controller
{
    function __construct(){
        $cloud_name = cloud_name();
        view()->share('cloud_name',$cloud_name);
    }
    public function combo()
    {
        $food = Food::all();
        $combo = Combo::orderBy('id', 'DESC')->paginate(10);
        return view('admin.combo.list', ['combo' => $combo, 'food' => $food]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Name is required',
        ]);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'combo',
                'format' => 'jpg',
            ])->getPublicId();
            $combo = new Combo(
                [
                    'name' => $request->name,
                    'image' => $cloud,
                    'price' => $request->price,
                ]
            );
        }
        $combo->save();
        return redirect('admin/combo')->with('success', 'Add Combo Successfully!');
    }

    public function postEdit(Request $request,$id)
    {
        $combo = Combo::find($id);
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => "Please enter Combo's name"
        ]);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $img = $request['image'] = $file;
            if ($combo['image'] != '') {
                Cloudinary::destroy($combo['image']);
            }
            $cloud = Cloudinary::upload($img->getRealPath(), [
                'folder' => 'combo',
                'format' => 'jpg',
            ])->getPublicId();
            $request['image'] = $cloud;
        }
        $combo->update($request->all());
        return redirect('admin/combo')->with('success', 'Updated Successfully!');
    }
    public function detail(Request $request,$id){
        dd($request);
    }
    public function delete($id)
    {
        $combo = Combo::find($id);
        Cloudinary::destroy($combo['image']);
        $combo->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }
}
