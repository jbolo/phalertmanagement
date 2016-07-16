@extends('admin.template.main')

@section('title','List of Locations')
@section('content')
    <a href="{{ route('admin.locations.create') }}" class="btn btn-info">Register new location</a><hr>
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
        </head>
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->address }}</td>
                    <td>{{ $location->latitude }}</td>
                    <td>{{ $location->longitude }}</td>
                    <td>
                        <a href="{{ route('admin.locations.edit',$location->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{ route('admin.locations.destroy',$location->id) }}" onclick="return confirm('Seguro que deseas eliminarlo')"
                           class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $locations->render() !!}
@endsection