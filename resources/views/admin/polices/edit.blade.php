@extends('admin.template.main')

@section('title','Edit Police '. $police->firt_name .' ' . $police->last_name )

@section('content')
    {!! Form::open(['route'=> ['admin.polices.update',$police],'method'=> 'PUT','']) !!}

    <div class=form-group">
        {!! Form::label('profile','Profile') !!}
        {!! Form::text('profile',$police->profile, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('first_name','First Name') !!}
        {!! Form::text('first_name', $police->first_name , ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('last_name','Last Name') !!}
        {!! Form::text('last_name',$police->last_name, ['class'=> 'form-control','required']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

