<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Evento;
use App\Local;
use Laracasts\Flash\Flash;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::orderBy('nombre','ASC')->paginate(5);

        return view('admin.eventos.index')->with('eventos',$eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Local::lists('descripcion', 'id');

        return view('admin.eventos.create')->with('locales',$locales);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->hora = $request->input('hora');

        $evento->local_id = $request->input('local_id');

        $evento->save();
        flash('Se ha registrado ' . $evento->nombre . ' de forma exitosa.','info');
        return redirect()->route('admin.eventos.index');
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
        $locales = Local::lists('descripcion', 'id');

        $evento=Evento::find($id);
        return view('admin.eventos.edit')->with([ 'evento' => $evento , 'locales' => $locales]);
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
        $evento = Evento::find($id);
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha = $request->input('fecha');
        $evento->hora = $request->input('hora');
        $evento->local_id = $request->input('local_id');

        $evento->save();

        flash('El evento ' . $evento->nombre . 'ha sido actualizado de forma exitosa.','info');
        return redirect()->route('admin.eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();
        flash('El evento ' . $evento->nombre . 'ha sido borrado de forma exitosa.','info');
        return redirect()->route('admin.eventos.index');
    }
}
