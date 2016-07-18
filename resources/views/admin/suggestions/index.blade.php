@extends('admin.template.main')

@section('title','List of Suggestions')
@section('content')
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>Date Suggestion</th>
            <th>Description</th>
            <th>Neighbor</th>
        </head>
        <tbody>
            @foreach($suggestions as $suggestion)
                <tr>
                    <td>{{ $suggestion->id }}</td>
                    <td>{{ $suggestion->date_suggestion }}</td>
                    <td>{{ $suggestion->description }}</td>
                    <td>{{ $suggestion->neighbor->first_name." ".$suggestion->neighbor->last_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $suggestions->render() !!}
@endsection