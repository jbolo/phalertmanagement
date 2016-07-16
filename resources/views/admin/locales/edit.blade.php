@extends('admin.template.main')

@section('title','Editar Local '. $local->descripcion)

@section('content')
    {!! Form::open(['route'=> ['admin.locales.update',$local],'method'=> 'PUT','']) !!}

    <div class=form-group">
        {!! Form::label('descripcion','Descripcion') !!}
        {!! Form::text('descripcion', $local->descripcion , ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('direccion','Direccion') !!}
        {!! Form::text('direccion',$local->direccion, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('posicion_gps','Posicion GPS') !!}
        {!! Form::text('posicion_gps',$local->posicion_gps, ['class'=> 'form-control','required']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

