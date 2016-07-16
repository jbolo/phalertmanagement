@extends('admin.template.main')

@section('title','List of Neighbors')
@section('content')
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone Number</th>
        </head>
        <tbody>
            @foreach($neighbors as $neighbor)
                <tr>
                    <td>{{ $neighbor->id }}</td>
                    <td>{{ $neighbor->first_name }}</td>
                    <td>{{ $neighbor->last_name }}</td>
                    <td>{{ $neighbor->address }}</td>
                    <td>{{ $neighbor->email }}</td>
                    <td>{{ $neighbor->phone_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $neighbors->render() !!}
@endsection