@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Cultures & Civilizations
@stop
@section('description')
    @parent
    Cultures & Civilizations Overview for Age of Mythology: The Titans
@stop

{{-- Content --}}
@section('content')
    <div class="row">
            @foreach($gods as $civ)
            <div class="text-center">
                @foreach($civ as $god)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a class="btn" href="gods/{{$god->slug}}"><img alt="{{$god->name}}" src="images/{{$god->image}}" /></a>
                <h2>
                    {{$god->name}}
                </h2>
                <p>
                    <span>{{$god->description}}</span>
                </p>
                <p>
                    <a class="btn" href="gods/{{$god->slug}}">{{$god->name}}</a>
                </p>
            </div>
                @endforeach
            </div>
                @endforeach
                @if(Auth::check())
                    You want to create some more fucking gods? Well good luck with that! <a href="gods/create">HERE!</a>
                    @endif
    </div>
@stop