@extends('admin.template.main')

@section('title','Register Location')

@section('content')
    {!! Form::open(['route'=> 'admin.locations.store','method'=> 'POST']) !!}

    <div class=form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null , ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('address','Address') !!}
        {!! Form::text('address',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('longitude','Longitude') !!}
        {!! Form::text('longitude',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('latitude','Latitude') !!}
        {!! Form::text('latitude',null, ['class'=> 'form-control','required']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

