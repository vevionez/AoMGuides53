@extends('layouts.default')

{{--Web site Title--}}
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
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(array('action' => 'GodsController@store', 'files'=>true)) !!}

            <h2>New Champion</h2>
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
            {!! Form::label('description', 'description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
            {!! Form::label('tier', 'Tier', ['class' => 'control-label']) !!}
            {!! Form::textarea('tier', '', ['class' => 'form-control'], ['size' => '200x100']) !!}
            {!! Form::label('Image', 'Image', ['class' => 'control-label']) !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

            {!! Form::close() !!}
        </div>
    </div>
    @stop