@extends('admin.template.main')

@section('title','Register Event')

@section('content')
    {!! Form::open(['route'=> 'admin.events.store','method'=> 'POST']) !!}

    <div class=form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::text('description',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('date_event','Date Event') !!}
        {!! Form::text('date_event',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('location_id','Location') !!}
        {!! Form::select('location_id',$locations, ['class'=> 'form-control']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Register',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

