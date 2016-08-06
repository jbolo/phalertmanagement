@extends('admin.template.main')

@section('title','Set Police to Report'. $report->id)

@section('content')
    {!! Form::open(['route'=> ['admin.reports.update',$report],'method'=> 'PUT','']) !!}

    <div class=form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::text('description', $report->description , ['class'=> 'form-control','disabled']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('type','Type') !!}
        {!! Form::text('type',$report->type, ['class'=> 'form-control','disabled']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('date_report','Date Report') !!}
        {!! Form::text('date_report',$report->date_report, ['class'=> 'form-control','disabled']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('address','Address') !!}
        {!! Form::text('address',$report->address, ['class'=> 'form-control','disabled']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('longitude','Longitude') !!}
        {!! Form::text('longitude',$report->longitude, ['class'=> 'form-control','disabled']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('latitude','Latitude') !!}
        {!! Form::text('latitude',$report->latitude, ['class'=> 'form-control','disabled']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('neighbor_id','Neighbor') !!}
        {!! Form::text('neighbor_id',$report->neighbor->first_name." ".$report->neighbor->last_name, ['class'=> 'form-control','disabled']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('police_id','Police') !!}
        {!! Form::select('police_id',$polices,$report->police_id , ['class'=> 'form-control']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

