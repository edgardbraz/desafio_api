<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\Event;

class TicketController extends RestController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Event $event)
    {
        $sales = Ticket::join('ticket_profiles', 'tickets.profile_id', 'ticket_profiles.id')
                        ->join('sales', 'tickets.sale_id', 'sales.id')
                        ->join('events', 'sales.event_id', 'events.id')
                        ->where("sales.event_id", $event->id);

        if($request->has('ticket_profile')) {
            $sales->where('ticket_profiles.id', $request->ticket_profile);
        }

        if($request->has('city')) {
            $sales->where('events.city', $request->city);
        }

        if($request->has('street')) {
            $sales->where('events.street', $request->street);
        }

        $sales = $sales->get();

        return parent::success(parent::SUCCESS, $sales, 'All tickets of the event were retrieved.');
    }
    
}
