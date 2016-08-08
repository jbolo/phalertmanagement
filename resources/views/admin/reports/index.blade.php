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
            <th>Location</th>
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
                    <td><a href="#" onclick="window.open('/phalertmanagement/admin/reports/mapreport?latitude={{ $report->latitude }}&longitude={{ $report->longitude }}  ','popup','width=630,height=480'); return false;">Ver</a></td>
                    <td>{{ $report->neighbor->first_name." ".$report->neighbor->last_name }}</td>
                    @if(isset($report->police))
                        <td><a href="{{ route('admin.reports.edit',$report->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>{{ $report->police->first_name." ".$report->police->last_name }}</td>
                    @else
                        <td><a href="{{ route('admin.reports.edit',$report->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $reports->render() !!}
@endsection