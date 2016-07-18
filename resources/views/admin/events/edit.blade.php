@extends('admin.template.main')

@section('title','Edit Event'. $event->name)

@section('content')
    {!! Form::open(['route'=> ['admin.events.update',$event],'method'=> 'PUT']) !!}

    <div class=form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$event->name, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::text('description',$event->description, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group" style="position: relative">
        {!! Form::label('date_event','Date Event') !!}
        {!! Form::text('date_event',$event->date_event, ['class'=> 'form-control','required']) !!}
    </div>
    <div class=form-group">
        {!! Form::label('location_id','Location') !!}
        {!! Form::select('location_id',$locations,$event->location_id , ['class'=> 'form-control']) !!}
    </div>
    <hr>
    <div class=form-group">
        {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
    </div>
    <script type="text/javascript">
        $(function () {
            $('#date_event').datetimepicker({
                widgetPositioning: {
                    horizontal: 'left',
                    vertical: 'bottom'
                },
                format : 'YYYY/MM/DD HH:mm:00'
            });
        });
    </script>
    {!! Form::close() !!}

@endsection

