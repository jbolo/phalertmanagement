<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use App\Report;
use App\Police;
use Laracasts\Flash\Flash;


class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::orderBy('id','ASC')->paginate(5);

        return view('admin.reports.index')->with('reports',$reports);
    }

    public function edit($id)
    {
        $polices = Police::selectRaw('CONCAT(first_name, " ", last_name) as fullname, id')->lists('fullname','id');

        $report=Report::find($id);
        return view('admin.reports.edit')->with([ 'report' => $report , 'polices' => $polices]);
    }

    public function update(Request $request, $id)
    {
        $report = Report::find($id);

        $report->police_id = $request->input('police_id');

        $report->save();

        flash('Police ' . $report->police->first_name ." " . $report->police->last_name . ' asigned.','info');
        return redirect()->route('admin.reports.index');
    }

    public function mapreport(Request $request)
    {
        $latitude=$request->input('latitude');
        $longitude=$request->input('longitude');
        return view('admin.reports.gmap')->with([ 'latitude' => $latitude , 'longitude' => $longitude]);
    }

    // API REST
    public function createReport(Request $request)
    {
        $report = new Report();
        //$report->description = $request->input('description');
        $report->type = $request->input('type');
        $report->date_report = date("Y-m-d H:i:s");
        //$report->address = $request->input('address');
        $report->longitude = $request->input('longitude');
        $report->latitude = $request->input('latitude');
        $report->neighbor_id = $request->input('neighbor_id');

        $report->save();

        return response()->json(['message' => 'Registrado correctamente.','result' => 'true']);
    }

}
