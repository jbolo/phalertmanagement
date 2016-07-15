@extends('admin.template.main')

@section('title','Lista de Locales')
@section('content')
    <a href="{{ route('admin.locales.create') }}" class="btn btn-info">Registrar nuevo local</a><hr>
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Direccion</th>
            <th>Accion</th>
        </head>
        <tbody>
            @foreach($locales as $local)
                <tr>
                    <td>{{ $local->id }}</td>
                    <td>{{ $local->descripcion }}</td>
                    <td>{{ $local->direccion }}</td>
                    <td>
                        <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{ route('admin.locales.destroy',$local->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $locales->render() !!}
@endsection