@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Champion Overview
@stop
@section('description')
    @parent
    Champion Overview of Bot of Legends scripts for League of Legends
@stop

@section('content')
    <div class="row">
            {!! Form::model($rec, ['method' => 'PATCH', 'route' => ['recorded_games.update', $rec->slug ], 'files'=>true]) !!}

            <h2>Edit Recorded Game</h2>
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!} <br/>
            {!! Form::label('gods_id', 'God', ['class' => 'control-label']) !!}
            {!! Form::select('gods_id', $gods, null, ['class' => 'form-control'] ) !!} <br/> <br/>
            {!! Form::label('description', 'description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            {!! Form::label('author', 'Author', ['class' => 'control-label']) !!}
            {!! Form::text('author', null, ['class' => 'form-control']) !!}
            {!! Form::label('patch', 'Patch', ['class' => 'control-label']) !!}
        {!! Form::select('patch', array('Voobly Balance Patch 1.05' => 'Voobly Balance Patch 1.05','Voobly Balance Patch 1.04' => 'Voobly Balance Patch 1.04','Voobly Balance Patch 1.03' => 'Voobly Balance Patch 1.03','Voobly Balance Patch 1.02' => 'Voobly Balance Patch 1.02','Voobly Balance Patch 1.01' => 'Voobly Balance Patch 1.01', 'Steam' => 'Steam', 'Vanilla AOT' => 'Vanilla AOT'), null, ['class' => 'form-control'])  !!}
            {!! Form::label('file_path', 'Recorded Game', ['class' => 'control-label']) !!}
            {!! Form::file('file_path', ['class' => 'form-control']) !!}
            <br/><br/>
            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

            {!! Form::close() !!}
            <br/><br/>
        </div>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea"
        });
    </script>
@stop