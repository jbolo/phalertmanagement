@extends('admin.template.main')

@section('title','Crear Evento')

@section('content')
    {!! Form::open(['route'=> ['admin.eventos.update',$evento],'method'=> 'PUT']) !!}

    <div class=form-group">
        {!! Form::label('nombre','Nombre') !!}
        {!! Form::text('nombre',$evento->nombre, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('descripcion','Descripcion') !!}
        {!! Form::text('descripcion',$evento->descripcion, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('fecha','Fecha') !!}
        {!! Form::text('fecha',$evento->fecha, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('hora','Hora') !!}
        {!! Form::text('hora',$evento->hora, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('local_id','Local') !!}
        {!! Form::select('local_id',$locales, ['class'=> 'form-control']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

