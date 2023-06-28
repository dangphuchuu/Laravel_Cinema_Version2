<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Subtitle;
use App\Models\Theater;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    //Schedule Movie
    public function schedule(Request $request)
    {

        $schedules = Schedule::all();
        $theaters = Theater::all();
        $audios = Audio::all();
        $subtitles = Subtitle::all();
        if (isset($request->theater) && isset($request->date)) {
            $date_cur = $request->date;
            $theater_cur = Theater::find($request->theater);
        } else {
            $date_cur = Carbon::today()->format('Y-m-d');
            $theater_cur = Theater::find(1);
        }
        $movies = Movie::whereDate('endDate', '>=', $date_cur)->get();
        return view('admin.schedules.list', [
            'theaters' => $theaters,
            'date_cur' => $date_cur,
            'theater_cur' => $theater_cur,
            'schedules' => $schedules,
            'movies' => $movies,
            'audios' => $audios,
            'subtitles' => $subtitles,
            'endTimeLatest' => '',
        ]);
    }

    public function postCreate(Request $request)
    {
//        (round($n)%$x === 0) ? round($n) : round(($n+$x/2)/$x)*$x;
//        dd($request->all());
        $movie = Movie::find($request->movie);
        $endTimeTemp = strtotime($request->startTime) + ($movie->showTime * 60);
        $endTimeHour = date('H', $endTimeTemp);
        $endTimeMinutes = date('i', $endTimeTemp);
        $endTimeMinutesRounded = (int)((round($endTimeMinutes) % 5 === 0) ? round($endTimeMinutes) : round(($endTimeMinutes + 5 / 2) / 5) * 5);
        if ($endTimeMinutesRounded == 60) {
            $endTimeHour++;
            $endTimeMinutesRounded = 0;
        }
        $startTime = $request->startTime;
        $endTime = $endTimeHour . ':' . $endTimeMinutesRounded;
        if ($request->remainingSchedules) {
            do {
                $schedule = new Schedule([
                    'room_id' => $request->room,
                    'movie_id' => $request->movie,
                    'audio_id' => $request->audio,
                    'subtitle_id' => $request->subtitle,
                    'date' => $request->date,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                ]);
                $schedule->save();
                $startTime = date('H:i', strtotime('+ 10 minutes', strtotime($schedule->endTime )));
//                dd($startTime);
                $endTimeTemp = strtotime($startTime) + ($movie->showTime * 60);
                $endTimeHour = date('H', $endTimeTemp);
                $endTimeMinutes = date('i', $endTimeTemp);
                $endTimeMinutesRounded = (int)((round($endTimeMinutes) % 5 === 0) ? round($endTimeMinutes) : round(($endTimeMinutes + 5 / 2) / 5) * 5);
                if ($endTimeMinutesRounded == 60) {
                    $endTimeHour++;
                    $endTimeMinutesRounded = 0;
                }
                $endTime = $endTimeHour . ':' . $endTimeMinutesRounded;
                unset($schedule);
                var_dump($startTime);
            } while ($endTime < '22:00');
        } else {

            $schedule = new Schedule([
                'room_id' => $request->room,
                'movie_id' => $request->movie,
                'audio_id' => $request->audio,
                'subtitle_id' => $request->subtitle,
                'date' => $request->date,
                'startTime' => $request->startTime,
                'endTime' => $endTime,
            ]);
            $schedule->save();
        }

        return redirect('admin/schedule?theater=' . $request->theater . '&date=' . $request->date);
    }

    public function postEdit()
    {
        return view('admin.schedules.edit');
    }

    public function status(Request $request)
    {
        $schedule = Schedule::find($request->schedule_id);
        $schedule['status'] = $request->active;
        $schedule->save();
        return response('success',200);
    }

    public function early_status(Request $request)
    {
        $schedule = Schedule::find($request->early_id);
        $schedule['early'] = $request->active;
        $schedule->save();
        return response('success',200);
    }

    public function delete($id, Request $request)
    {
        $schedule = Schedule::find($id);
        if ($schedule['status'] == 0) {
            Schedule::destroy($id);
            return redirect('admin/schedule?theater=' . $request->theater . '&date=' . $request->date)->with('success', 'Delete Successfully');
        } else {
            return redirect('admin/schedule?theater=' . $request->theater . '&date=' . $request->date)->with('error', "Please change status to offline");
        }

    }

    public function deleteAll(Request $request)
    {
//        Schedule::where('room_id', $request->room)->where('date', $request->date)->delete();
//        return redirect('admin/schedule?theater=' . $request->theater . '&room=' . $request->room . '&date=' . $request->date)
//            ->with('success', 'Deleted all schedules successfully!');
        Schedule::where('room_id', $request->room_id)->where('date', $request->date)->delete();
        return response()->json([
            'success'=>'Xóa thành công'
        ]);
    }
}
