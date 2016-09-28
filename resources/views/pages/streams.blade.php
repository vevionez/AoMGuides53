@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Streams
@stop
@section('description')
    @parent
    Overview of streamers currently streaming Age of Mythology
@stop

@section('content')
    <div class="row">
        <div class="col_lg_2">
            <h2>AOM:EE Streams:</h2>
            {{ var_dump($aomeestreams) }}
            <h2>AOM:TT Streams:</h2>
            {{ var_dump($aomttstreams) }}
        </div>
    </div>
@stop