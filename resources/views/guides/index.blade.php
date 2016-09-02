@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Guides Overview
@stop
@section('description')
    @parent
    Guides Overview of Civilizations and Cultures in Age of Mythology: The Titans.
@stop

{{-- Content --}}
@section('content')
        <div class="row">
            @if(Auth::check())
                You want to create some more fucking guides? Well good luck with that! <a href="guides/create">HERE!</a>
            @endif
                <h2> General Guides:</h2>
                @foreach($genguides as $guide)

                    <li>
                        @if(Auth::check())
                            {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('guides.destroy', $guide->slug))) !!}
                            <a class="btn" href="guides/{{$guide->slug}}">{{$guide->name}}</a>
                            {!! link_to_route('guides.edit', 'Edit', $guide->slug, array('class' => 'btn btn-info')) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                            @if($guide->votes > 100)
                                <span class="badge alert-danger">Votes:{{$guide->votes}}</span>
                            @elseif($guide->votes > 50)
                                <span class="badge alert-warning">Votes:{{$guide->votes}}</span>
                            @elseif($guide->votes > 20)
                                <span class="badge alert-info">Votes:{{$guide->votes}}</span>
                            @else
                                <span class="badge">Votes:{{$guide->votes}}</span>
                            @endif
                            <span class="badge">Views: {{$guide->views}}</span>
                            {!! Form::close() !!}
                        @else
                            <a class="btn" href="guides/{{$guide->slug}}">{{$guide->name}}</a>
                            @if($guide->votes > 100)
                                <span class="badge alert-danger">Votes: {{$guide->votes}}</span>
                            @elseif($guide->votes > 50)
                                <span class="badge alert-warning">Votes: {{$guide->votes}}</span>
                            @elseif($guide->votes > 20)
                                <span class="badge alert-info">Votes: {{$guide->votes}}</span>
                            @else
                                <span class="badge">Votes: {{$guide->votes}}</span>
                                <span class="badge">Views: {{$guide->views}}</span>
                            @endif
                        @endif
                    </li>
                @endforeach


                <h2> Guides for Specific Gods:</h2>
            <ul>
                @foreach($godguides as $guide)

                        <li>
                            @if(Auth::check())
                                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('guides.destroy', $guide->slug))) !!}
                                <a class="btn" href="guides/{{$guide->slug}}">{{$guide->name}}</a>
                                {!! link_to_route('guides.edit', 'Edit', $guide->slug, array('class' => 'btn btn-info')) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                                @if($guide->votes > 100)
                                    <span class="badge alert-danger">Votes:{{$guide->votes}}</span>
                                @elseif($guide->votes > 50)
                                    <span class="badge alert-warning">Votes:{{$guide->votes}}</span>
                                @elseif($guide->votes > 20)
                                    <span class="badge alert-info">Votes:{{$guide->votes}}</span>
                                @else
                                    <span class="badge">Votes:{{$guide->votes}}</span>
                                @endif
                                <span class="badge">Views: {{$guide->views}}</span>
                                {!! Form::close() !!}
                                @else
                                <a class="btn" href="guides/{{$guide->slug}}">{{$guide->name}}</a>
                                @if($guide->votes > 100)
                                    <span class="badge alert-danger">Votes: {{$guide->votes}}</span>
                                @elseif($guide->votes > 50)
                                    <span class="badge alert-warning">Votes: {{$guide->votes}}</span>
                                @elseif($guide->votes > 20)
                                    <span class="badge alert-info">Votes: {{$guide->votes}}</span>
                                @else
                                    <span class="badge">Votes: {{$guide->votes}}</span>
                                    <span class="badge">Views: {{$guide->views}}</span>
                                @endif
                        @endif
                        </li>
                @endforeach
            </ul>

        </div>
@stop