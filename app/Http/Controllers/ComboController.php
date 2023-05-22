<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Food;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ComboController extends Controller
{
    public function combo()
    {
        $food = Food::all();
        $combo = Combo::orderBy('id', 'DESC')->paginate(10);
        return view('admin.combo.list', ['combo' => $combo, 'food' => $food]);
    }

    public function postCreate()
    {

    }

    public function postEdit()
    {

    }

    public function delete()
    {

    }
}
