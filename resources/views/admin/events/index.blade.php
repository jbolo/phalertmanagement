@extends('admin.template.main')

@section('title','List of Events')
@section('content')
    <a href="{{ route('admin.events.create') }}" class="btn btn-info">Register new event</a><hr>
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date Event</th>
            <th>Location</th>
            <th>Accion</th>
        </head>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->date_event }}</td>
                    <td>{{ $event->location_id }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit',$event->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{ route('admin.events.destroy',$event->id) }}" onclick="return confirm('Seguro que deseas eliminarlo')"
                           class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $events->render() !!}
@endsection