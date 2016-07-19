@extends('admin.template.main')

@section('title','Register Police')

@section('content')
    {!! Form::open(['route'=> 'admin.polices.store','method'=> 'POST']) !!}

    <div class=form-group">
        {!! Form::label('profile','Profile') !!}
        {!! Form::text('profile', null , ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('first_name','First Name') !!}
        {!! Form::text('first_name', null , ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('last_name','Last Name') !!}
        {!! Form::text('last_name', null , ['class'=> 'form-control','required']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Register',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

