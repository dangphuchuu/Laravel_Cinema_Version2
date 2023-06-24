<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function statistical(){
        return view('admin.statistical.list');
    }
    public function filter_by_date(Request $request){
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        if($start_time && $end_time){
            $get = Ticket::whereBetween('created_at',[$start_time,$end_time])->get();
        }
        return view('admin.statistical.list',['get'=>$get]);
    }
    public function statistical_filter(Request $request){
        $data = $request->all();
         $now =Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $week = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();

        if($data['statistical_value'] == 'week'){
           $get= Ticket::whereBetween('created_at',[$week,$now])->orderBy('created_at','ASC')->get();
        }
        return response()->json(['success'=> $get]);
    }
}
