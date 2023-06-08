<?php

namespace App\Http\Controllers;

use App\Models\TicketSeat;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticket()
    {
        $ticket_seat = TicketSeat::all();
        return view('admin.ticket.list',['ticket_seat'=>$ticket_seat]);
    }
}
