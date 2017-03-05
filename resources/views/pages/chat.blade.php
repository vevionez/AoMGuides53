@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Clans
@stop
@section('description')
    @parent
    Overview and links to active Age of Mythology clans.
@stop

@section('content')
    <div class="row">
        <div class="col_lg_2">
            <h2>Aomguides IRC Channel:</h2>
            <iframe src="https://kiwiirc.com/client/irc.ugaris.com/?nick=AoM_|?#aomguides" style="border:0; width:100%; height:450px;"></iframe>


        </div>
    </div>
@stop