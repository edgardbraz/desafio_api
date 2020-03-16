<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;

class EventController extends RestController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();
        if($events)
            return parent::success(parent::SUCCESS, $events, 'All events were retrieved.');
        else
            return parent::error(parent::NOT_FOUND, null, 'There are no events.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {   
        return parent::success(parent::SUCCESS, $event, '1 event was retrieved.');
    }

    /**
     * Store the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'owner_id' => 'required|exists:users,id',
            'datetime_begin' => 'required|string',
            'datetime_end' => 'required|string',
            'status_id' => 'required|exists:event_statuses,id',
            'category_id' => 'required|exists:event_categories,id',
            'state' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|integer'
        ]); 
        
        $data = $request->input();
        $data['slug'] = Str::slug($data['name'], '-');
        $event = new Event();
        if($event->create($data))
            return parent::success(parent::SUCCESS, $data, 'The event was successfully created.');
        else
            return parent::error(parent::NOT_PROCESSED, null, 'The event could not be created.');
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if(Auth::id() == $event->owner_id) {
            $event->update($request->input());
            return parent::success(parent::SUCCESS, $event, '1 event was updated.');
        } else {
            return parent::success(parent::FORBIDDEN, null, "You don't have permissions to edit this event.");
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return parent::success(parent::SUCCESS, $event, '1 event was deleted.');
    }
}
