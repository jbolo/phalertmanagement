@extends('admin.template.main')

@section('title','Edit Location '. $location->name)

@section('content')
    {!! Form::open(['route'=> ['admin.locations.update',$location],'method'=> 'PUT','']) !!}

    <div class=form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', $location->name , ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('address','Address') !!}
        {!! Form::text('address',$location->address, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('latitude','Latitude') !!}
        {!! Form::text('latitude',$location->latitude, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('longitude','Longitude') !!}
        {!! Form::text('longitude',$location->longitude, ['class'=> 'form-control','required']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

