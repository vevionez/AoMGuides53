@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Guide : {{$guide['name']}}
@stop
@section('description')
    @parent
   A guide for Age of Mythology: The Titans : {{$guide['name']}}
@stop

@section('content')

    @if(Auth::check())
        You are allowed to edit this guide! <a href="{{$guide['slug']}}/edit">HERE!</a> <br/>
    @endif
    <div class="author-info pull-right">
        <ul class="list-group">
            
            <li class="list-group-item">Author: {{$guide['author']}}</li>
            <li class="list-group-item">
                <span class="badge">{{$guide['votes']}}</span>
                Votes:
            </li>
            <li class="list-group-item">
                <span class="badge">{{$guide['views']}}</span>
                Views:
            </li>
        </ul>
    </div>

    <h1 class="text-center">Guide</h1>

    {!! $guide['description'] !!}

    @stop