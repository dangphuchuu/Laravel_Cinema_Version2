<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoController extends Controller
{
    public function info()
    {
        $info = Info::find(1);
        return view('admin.info', [
            'info' => $info
        ]);
    }
    public function postInfo(Request $request)
    {
        $info = Info::find(1);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('admin/info')->with('warning', 'Không hỗ trợ ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists('images/favicon/' . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('images/favicon/', $img);
            if ($info->logo != '') {
                unlink('images/favicon/' . $info->logo);
            }
            $request['logo'] = $img;
        }

        $info->update($request->all());

        return redirect('admin/info')->with('success', 'Thành công');
    }
}
