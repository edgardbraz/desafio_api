<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Sale;
use App\Ticket;
use App\Event;

class SalesController extends RestController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'ticket_profile' => 'required|exists:ticket_profiles,id'
        ]); 

        $sale = Sale::where('sales.event_id', $event->id)
                ->where('sales.buyer_id', Auth::id())
                ->where('sales.status_id', 1)->first();
        
        if(empty($sale)) {
            $sale = new Sale();
            $sale::create([
                'buyer_id'=>Auth::id(),
                'event_id'=>$event->id,
                'status_id'=>1,
                'datetime_begin'=>Carbon::now(),
            ]);
        }

        //If there's an open sale
        Ticket::create([
            'status_id'=>1,
            'code'=> rand(1000000, 9999999),
            'sale_id'=> $sale->id,
            'profile_id'=> $request->input('ticket_profile'),
        ]);

        $data = Ticket::join('ticket_profiles', 'tickets.profile_id', 'ticket_profiles.id')
            ->where("sale_id", $sale->id)->get();
                
        return parent::success(parent::SUCCESS, $data, 'All tickets of the event were retrieved.');
    }

     /**
     * Clear tickets of the sale
     *
     * @return \Illuminate\Http\Response
     */
    public function clear(Request $request, Event $event)
    {
        $sale = Sale::where('sales.event_id', $event->id)
                ->where('sales.buyer_id', Auth::id())
                ->where('sales.status_id', 1)
                ->first();
        if($sale) {
            Ticket::join('ticket_profiles', 'tickets.profile_id', 'ticket_profiles.id')
            ->where("sale_id", $sale->id)->delete();
    
            return parent::success(parent::SUCCESS, 'All tickets were removed from the sale.');

        }
                
        return parent::success(parent::NOT_FOUND, null,'The sale does not exists.');
    }
}
