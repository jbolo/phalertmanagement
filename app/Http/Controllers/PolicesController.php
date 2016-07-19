<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Police;
use Laracasts\Flash\Flash;

class PolicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polices = Police::orderBy('id','ASC')->paginate(5);
        return view('admin.polices.index')->with('polices',$polices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.polices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $police = new Police($request->all());
        $police->save();
        flash('Police ' . $police->first_name.' ' .$police->last_name . ' registered succefull.','info');
        return redirect()->route('admin.polices.index');
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
        $police=Police::find($id);
        return view('admin.polices.edit')->with('police',$police);
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
        $police = Police::find($id);
        $police->profile = $request->input('profile');
        $police->first_name = $request->input('first_name');
        $police->last_name = $request->input('last_name');

        $police->save();

        flash('Police ' . $police->first_name.' ' .$police->last_name  . ' updated successful.','info');
        return redirect()->route('admin.polices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $police= Police::find($id);
        $police->delete();
        flash('Police ' . $police->first_name.' ' .$police->last_name  . ' removed successful.','info');
        return redirect()->route('admin.polices.index');
    }
}
