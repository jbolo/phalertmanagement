@extends('admin.template.main')

@section('title','Lista de Eventos')
@section('content')
    <a href="{{ route('admin.eventos.create') }}" class="btn btn-info">Registrar nuevo evento</a><hr>
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Local</th>
            <th>Accion</th>
        </head>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->descripcion }}</td>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->hora }}</td>
                    <td>{{ $evento->local_id }}</td>
                    <td>
                        <a href="{{ route('admin.eventos.edit',$evento->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{ route('admin.eventos.destroy',$evento->id) }}" onclick="return confirm('Seguro que deseas eliminarlo')"
                           class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $eventos->render() !!}
@endsection