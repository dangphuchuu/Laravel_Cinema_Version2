<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\RoomType;
use App\Models\SeatType;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function price()
    {
        $roomTypes = RoomType::where('name', '!=', '2D')->get();
        $seatType = SeatType::where('name', '!=', 'standard')->get();

        $hssv2345t17 = Price::where('day', '2345')->where('generation', 'hssv')->where('after', null)->get();
        $hssv2345s17 = Price::where('day', '2345')->where('generation', 'hssv')->where('after', '17:00')->get();

        $nl2345t17 = Price::where('day', '2345')->where('generation', 'nl')->where('after', null)->get();
        $nl2345s17 = Price::where('day', '2345')->where('generation', 'nl')->where('after', '17:00')->get();

        $nctte2345t17 = Price::where('day', '2345')->where('generation', 'nctte')->where('after', null)->get();
        $nctte2345s17 = Price::where('day', '2345')->where('generation', 'nctte')->where('after', '17:00')->get();

        $vtt2345t17 = Price::where('day', '2345')->where('generation', 'vtt')->where('after', null)->get();
        $vtt2345s17 = Price::where('day', '2345')->where('generation', 'vtt')->where('after', '17:00')->get();

        $hssv67cnt17 = Price::where('day', '67cn')->where('generation', 'hssv')->where('after', null)->get();
        $hssv67cns17 = Price::where('day', '67cn')->where('generation', 'hssv')->where('after', '17:00')->get();

        $nl67cnt17 = Price::where('day', '67cn')->where('generation', 'nl')->where('after', null)->get();
        $nl67cns17 = Price::where('day', '67cn')->where('generation', 'nl')->where('after', '17:00')->get();

        $nctte67cnt17 = Price::where('day', '67cn')->where('generation', 'nctte')->where('after', null)->get();
        $nctte67cns17 = Price::where('day', '67cn')->where('generation', 'nctte')->where('after', '17:00')->get();

        $vtt67cnt17 = Price::where('day', '67cn')->where('generation', 'vtt')->where('after', null)->get();
        $vtt67cns17 = Price::where('day', '67cn')->where('generation', 'vtt')->where('after', '17:00')->get();


        return view('admin.prices.list', [
            'roomTypes' => $roomTypes,
            'seatTypes' => $seatType,
            'hssv2345t17' => $hssv2345t17->first()->price,
            'hssv2345s17' => $hssv2345s17->first()->price,
            'nl2345t17' => $nl2345t17->first()->price,
            'nl2345s17' => $nl2345s17->first()->price,
            'nctte2345t17' => $nctte2345t17->first()->price,
            'nctte2345s17' => $nctte2345s17->first()->price,
            'vtt2345t17' => $vtt2345t17->first()->price,
            'vtt2345s17' => $vtt2345s17->first()->price,
            'hssv67cnt17' => $hssv67cnt17->first()->price,
            'hssv67cns17' => $hssv67cns17->first()->price,
            'nl67cnt17' => $nl67cnt17->first()->price,
            'nl67cns17' => $nl67cns17->first()->price,
            'nctte67cnt17' => $nctte67cnt17->first()->price,
            'nctte67cns17' => $nctte67cns17->first()->price,
            'vtt67cnt17' => $vtt67cnt17->first()->price,
            'vtt67cns17' => $vtt67cns17->first()->price,
        ]);
    }

    public function edit(Request $request)
    {
        $hssv2345t17 = Price::find(1);
        $hssv2345t17->price = $request->hssv2345t17;
        $hssv2345t17->save();

        $hssv2345s17 = Price::find(2);
        $hssv2345s17->price = $request->hssv2345s17;
        $hssv2345s17->save();

        $nl2345t17 = Price::find(3);
        $nl2345t17->price = $request->nl2345t17;
        $nl2345t17->save();

        $nl2345s17 = Price::find(4);
        $nl2345s17->price = $request->nl2345s17;
        $nl2345s17->save();

        $nctte2345t17 = Price::find(5);
        $nctte2345t17->price = $request->nctte2345t17;
        $nctte2345t17->save();

        $nctte2345s17 = Price::find(6);
        $nctte2345s17->price = $request->nctte2345s17;
        $nctte2345s17->save();

        $vtt2345t17 = Price::find(7);
        $vtt2345t17->price = $request->vtt2345t17;
        $vtt2345t17->save();

        $vtt2345s17 = Price::find(8);
        $vtt2345s17->price = $request->vtt2345s17;
        $vtt2345s17->save();

        $hssv67cnt17 = Price::find(9);
        $hssv67cnt17->price = $request->hssv67cnt17;
        $hssv67cnt17->save();

        $hssv67cns17 = Price::find(10);
        $hssv67cns17->price = $request->hssv67cns17;
        $hssv67cns17->save();

        $nl67cnt17 = Price::find(11);
        $nl67cnt17->price = $request->nl67cnt17;
        $nl67cnt17->save();

        $nl67cns17 = Price::find(12);
        $nl67cns17->price = $request->nl67cns17;
        $nl67cns17->save();

        $nctte67cnt17 = Price::find(13);
        $nctte67cnt17->price = $request->nctte67cnt17;
        $nctte67cnt17->save();

        $nctte67cns17 = Price::find(14);
        $nctte67cns17->price = $request->nctte67cns17;
        $nctte67cns17->save();

        $vtt67cnt17 = Price::find(15);
        $vtt67cnt17->price = $request->vtt67cnt17;
        $vtt67cnt17->save();

        $vtt67cns17 = Price::find(16);
        $vtt67cns17->price = $request->vtt67cns17;
        $vtt67cns17->save();

        $roomTypes = RoomType::all();

        foreach ($roomTypes as $roomType) {
            $rt = RoomType::find($roomType->id);
            $rt->surcharge = $request[$roomType->name];
            $rt->save();
            unset($rt);
        }

        $seatTypes = SeatType::all();

        foreach ($seatTypes as $seatType) {
            $st = SeatType::find($seatType->id);
            $st->surcharge = $request[$seatType->name];
            $st->save();
            unset($st);
        }

        return redirect('admin/prices')->with('success', 'Saved!');
    }
}
