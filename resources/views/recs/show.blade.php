@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Recorded game : {{$rec['name']}}
@stop
@section('description')
    @parent
    A Recorded Game for Age of Mythology: The Titans : {{$rec['name']}}
@stop

@section('content')

    @if(Auth::check())
        You are allowed to edit this guide! <a href="{{$rec['slug']}}/edit">HERE!</a> <br/>
    @endif
    <strong>Name:</strong> {{$rec['name']}} <br/>
    <strong>Author:</strong> {{$rec['author']}}<br/>
    <strong>Votes:</strong> {{$rec['votes']}}<br/>
    <strong>Views:</strong> {{$rec['views']}}<br/><br/>
    <strong>Patch:</strong> {{$rec['patch']}}<br/><br/>

    <strong>Description:</strong> <br/><br/>

    {!! $rec['description'] !!}
    <br/><br/><br/>

    <a href="/{{$rec['file_path']}}">Download</a>
    @stop