<?php

namespace App\Http\Controllers;

class SchedulesController extends Controller
{
    //Schedule Movie
    public function schedule()
    {
        return view('admin.schedules.list');
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
