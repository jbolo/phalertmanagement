<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Neighbors;
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
        $neighbors = Neighbors::orderBy('id','ASC')->paginate(5);

        return view('admin.neighbors.index')->with('neighbors',$neighbors);
    }
}
