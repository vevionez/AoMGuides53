@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Chat
@stop
@section('description')
    @parent
    Connect with us over IRC chat and ask any questions you wish, or just drop in for a friendly chat about Age of Mythology.
@stop

@section('content')
    <div class="row">
        <div class="col_lg_2">
            <h2>Aomguides IRC Channel:</h2>
            <iframe src="https://kiwiirc.com/client/irc.ugaris.com/?nick=AoM_|?#aomguides" style="border:0; width:100%; height:450px;"></iframe>


        </div>
    </div>
@stop