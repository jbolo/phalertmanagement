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
        {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

