<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Suggestion;
use Laracasts\Flash\Flash;

class SuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = Suggestion::orderBy('id','ASC')->paginate(5);

        return view('admin.suggestions.index')->with('suggestions',$suggestions);
    }
}
