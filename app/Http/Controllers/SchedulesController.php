<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Theater;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    //Schedule Movie
    public function schedule(Request $request)
    {
        $schedules = Schedule::all();
        $theaters = Theater::all();
        if (isset($request)) {
            $theater_cur = Theater::find($request->theater);
        }
        return view('admin.schedules.list', [
            'theaters' => $theaters,
            'theater_cur' => $theater_cur,
            'schedules' => $schedules
        ]);
    }

    public function postCreate()
    {
        return view('admin.schedules.create');
    }

    public function postEdit()
    {
        return view('admin.schedules.edit');
    }
}
