<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Event;
use App\Location;
use App\Participant;
use DB;
use Laracasts\Flash\Flash;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('name','ASC')->paginate(5);
        return view('admin.events.index')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::lists('name', 'id');

        return view('admin.events.create')->with('locations',$locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->date_event = $request->input('date_event');

        $event->location_id = $request->input('location_id');

        $event->save();
        flash('Event' . $event->name . ' regitered success.','info');
        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::lists('name', 'id');

        $event=Event::find($id);
        return view('admin.events.edit')->with([ 'event' => $event , 'locations' => $locations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->date_event = $request->input('date_event');

        $event->location_id = $request->input('location_id');

        $event->save();

        flash('Event ' . $event->name . ' updated successfull.','info');
        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        flash('Event ' . $event->name . ' removed successfull.','info');
        return redirect()->route('admin.events.index');
    }

    // API REST
    public function listEvents($id)
    {
        //
        //$events=Event::all();

        $events=DB::select('select e.*,(select 1 from participants p where p.neighbor_id=? and p.event_id=e.id) as suscribed from events e',[$id]);
        return $events;
    }

    public function showEvent($id)
    {
        $events=Event::find($id);

        return $events;
    }

    public function suscribeEvent(Request $request)
    {
        $action=$request->input('action');

        $participant=Participant::where('neighbor_id','=',$request->input('neighbor_id'))
                                ->where('event_id','=',$request->input('event_id'))->first();

        if(isset($participant->neighbor_id) and ($action=="suscribe")){
            return response()->json(['message' => 'Ya se encuentra suscrito.','result' => 'false']);
        }

        if(!isset($participant->neighbor_id) and ($action=="unsuscribe")){
            return response()->json(['message' => 'Ya se encuentra desuscrito.','result' => 'false']);
        }

        if($action=="suscribe"){

            $participant=new Participant();
            $participant->neighbor_id=$request->input('neighbor_id');
            $participant->event_id=$request->input('event_id');
            $participant->save();

            return response()->json(['message' => 'Suscrito correctamente.','result' => 'true']);
        }
        if($action=="unsuscribe"){

            Participant::where('neighbor_id','=',$request->input('neighbor_id'))
                       ->where('event_id','=',$request->input('event_id'))->delete();
            return response()->json(['message' => 'Desuscrito correctamente.','result' => 'true']);
        }

    }

}
