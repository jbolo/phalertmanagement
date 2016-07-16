@extends('admin.template.main')

@section('title','Crear Local')

@section('content')
    {!! Form::open(['route'=> 'admin.locales.store','method'=> 'POST']) !!}

    <div class=form-group">
        {!! Form::label('descripcion','Descripcion') !!}
        {!! Form::text('descripcion',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('direccion','Direccion') !!}
        {!! Form::text('direccion',null, ['class'=> 'form-control','required']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

