<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Local;
use Laracasts\Flash\Flash;

class LocalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = Local::orderBy('id','ASC')->paginate(5);

        return view('admin.locales.index')->with('locales',$locales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $local = new Local($request->all());
        $local->save();
        flash('Se ha registrado ' . $local->descripcion . ' de forma exitosa.','info');
        return redirect()->route('admin.locales.index');
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
        $local=Local::find($id);
        return view('admin.locales.edit')->with('local',$local);
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
        $local = Local::find($id);
        $local->descripcion = $request->input('descripcion');
        $local->direccion = $request->input('direccion');
        $local->posicion_gps = $request->input('posicion_gps');

        $local->save();

        flash('El local ' . $local->descripcion . 'ha sido actualizado de forma exitosa.','info');
        return redirect()->route('admin.locales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $local= Local::find($id);
        $local->delete();
        //flash('El local '+ $local->id +' ha sido borrado de forma exitosa.','info');
        flash('El local ' . $local->descripcion . 'ha sido borrado de forma exitosa.','info');
        return redirect()->route('admin.locales.index');
    }
}
