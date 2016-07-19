@extends('admin.template.main')

@section('title','List of Polices')
@section('content')
    <a href="{{ route('admin.polices.create') }}" class="btn btn-info">Register new police</a><hr>
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>Profile</th>
            <th>First Name</th>
            <th>Last Name</th>
        </head>
        <tbody>
            @foreach($polices as $police)
                <tr>
                    <td>{{ $police->id }}</td>
                    <td>{{ $police->profile }}</td>
                    <td>{{ $police->first_name }}</td>
                    <td>{{ $police->last_name }}</td>
                    <td>
                        <a href="{{ route('admin.polices.edit',$police->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{ route('admin.polices.destroy',$police->id) }}" onclick="return confirm('Seguro que deseas eliminarlo')"
                           class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $polices->render() !!}
@endsection