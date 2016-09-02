@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Recorded Games Overview
@stop
@section('description')
    @parent
    Recorded Games Overview of Age of Mythology: The Titans
@stop

{{-- Content --}}
@section('content')
        <div class="row">
            @if(Auth::check())
                You want to create some more fucking Recorded Games? Well good luck with that! <a href="recorded_games/create">HERE!</a>
            @endif
            <ul>
                @foreach($recs as $rec)

                        <li>
                            @if(Auth::check())
                                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('recorded_games.destroy', $rec->slug))) !!}
                                <a class="btn" href="recorded_games/{{$rec->slug}}">{{$rec->name}}</a>
                                {!! link_to_route('recorded_games.edit', 'Edit', $rec->slug, array('class' => 'btn btn-info')) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                                @if($rec->votes > 100)
                                    <span class="badge alert-danger">Votes:{{$rec->votes}}</span>
                                @elseif($rec->votes > 50)
                                    <span class="badge alert-warning">Votes:{{$rec->votes}}</span>
                                @elseif($rec->votes > 20)
                                    <span class="badge alert-info">Votes:{{$rec->votes}}</span>
                                @else
                                    <span class="badge">Votes:{{$rec->votes}}</span>
                                @endif
                                <span class="badge">Views: {{$rec->views}}</span>
                                <span class="badge">Downloads: {{$rec->views}}</span>
                                {!! Form::close() !!}
                            @else

                                <a class="btn" href="recorded_games/{{$rec->slug}}">{{$rec->name}}</a>
                                @if($rec->votes > 100)
                                    <span class="badge alert-danger">Votes: {{$rec->votes}}</span>
                                @elseif($rec->votes > 50)
                                    <span class="badge alert-warning">Votes: {{$rec->votes}}</span>
                                @elseif($rec->votes > 20)
                                    <span class="badge alert-info">Votes: {{$rec->votes}}</span>
                                @else
                                    <span class="badge">Votes: {{$rec->votes}}</span>
                                    <span class="badge">Views: {{$rec->views}}</span>
                                    <span class="badge">Downloads: {{$rec->views}}</span>
                                @endif
                        @endif
                        </li>
                @endforeach
            </ul>

        </div>
@stop