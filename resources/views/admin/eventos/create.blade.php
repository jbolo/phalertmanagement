@extends('admin.template.main')

@section('title','Crear Evento')

@section('content')
    {!! Form::open(['route'=> 'admin.eventos.store','method'=> 'POST']) !!}

    <div class=form-group">
        {!! Form::label('nombre','Nombre') !!}
        {!! Form::text('nombre',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('descripcion','Descripcion') !!}
        {!! Form::text('descripcion',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('fecha','Fecha') !!}
        {!! Form::text('fecha',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('hora','Hora') !!}
        {!! Form::text('hora',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('local_id','Local') !!}
        {!! Form::select('local_id',$locales, ['class'=> 'form-control']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

