@extends('admin.template.main')

@section('title','Register Event')

@section('content')
    {!! Form::open(['route'=> 'admin.events.store','method'=> 'POST','role'=>'form']) !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Description') !!}
        {!! Form::text('description',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class="form-group" style="position: relative">
        {!! Form::label('date_event','Date Event') !!}
        {!! Form::text('date_event',null, ['class'=> 'form-control','required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('location_id','Location') !!}
        {!! Form::select('location_id',$locations, null, ['class'=> 'form-control']) !!}
    </div>
    <hr>
    <div class="form-group">
        {!! Form::submit('Register',['class'=>'btn btn-primary']) !!}
    </div>
    <script type="text/javascript">
        $(function () {
            $('#date_event').datetimepicker({
                widgetPositioning: {
                    horizontal: 'left',
                    vertical: 'bottom'
                }
            });
        });
    </script>
    {!! Form::close() !!}
@endsection

