<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Neighbor;
use Laracasts\Flash\Flash;

class NeighborsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neighbors = Neighbor::orderBy('id','ASC')->paginate(5);

        return view('admin.neighbors.index')->with('neighbors',$neighbors);
    }
    // API
    public function updateNeighbor(Request $request, $id)
    {
        $neighbors = Neighbor::find($id);
        $neighbors->first_name = $request->input('first_name');
        $neighbors->last_name = $request->input('last_name');
        $neighbors->address = $request->input('address');
        $neighbors->phone_number = $request->input('phone_number');

        $neighbors->save();

        return response()->json(['message' => 'Actualizado correctamente.','result' => 'true']);
    }
}
