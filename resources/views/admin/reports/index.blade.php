@extends('admin.template.main')

@section('title','List of Reports')
@section('content')
    <table class="table table-striped" >
        <head>
            <th>ID</th>
            <th>Description</th>
            <th>Type</th>
            <th>Date Report</th>
            <th>Address</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Neighbor</th>
            <th>Police</th>
        </head>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ $report->type }}</td>
                    <td>{{ $report->date_report }}</td>
                    <td>{{ $report->address }}</td>
                    <td>{{ $report->longitude }}</td>
                    <td>{{ $report->latitude }}</td>
                    <td>{{ $report->neighbor->first_name." ".$report->neighbor->last_name }}</td>
                    <td>{{ $report->police->first_name." ".$report->police->last_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $reports->render() !!}
@endsection