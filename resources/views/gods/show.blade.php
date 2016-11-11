@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Guides & Recorded Games for {{ $god->name }}
@stop
@section('description')
    @parent
    Guides & Recorded Games for {{ $god->name }}. {{ $god->name }} is a god choice in Age of Mythology: The Titans
@stop

@section('content')

    <img alt="{{$god->name}}" src="/images/{{$god->image}}" />
    <br>
    <h2>{{ $god->name }}</h2>
    <small>{{$god->description}}</small>
<br><br><br>
    <h4>Guides: </h4>
    <ul>
@foreach($guides as $guide)
        <li><a href="/guides/{{$guide['slug']}}">{{ $guide['name'] }}</a> Votes: {{$guide['votes']}} Views: {{$guide['views']}}
        @if(! Session::get('voted_guide_' . $guide['id']))
            <div class="vote" style="display: inline-block;">
                {!! Form::open(array('route' => array('guides.upvote', $guide['slug']), 'method' => 'PATCH')) !!}
                <button type="submit" class="btn btn-default" style="border: 0; background: transparent; color: #ff0000;"><i class="fa fa-angle-double-up"></i></button>
                {!! Form::close() !!}
            </div>
            <div class="vote" style="display: inline-block;">
                {!! Form::open(array('route' => array('guides.downvote', $guide['slug'],), 'method' => 'PATCH')) !!}
                <button type="submit" class="btn btn-default" style="border: 0; background: transparent; color: #ff0000;"><i class="fa fa-angle-double-down"></i></button>
                {!! Form::close() !!}
            </div>
        @endif
</li>
@endforeach
    </ul>
    <br/>
    <h4>Recorded Games:</h4>
    <ul>
    @foreach($recs as $recgame)
    <li><a href="/recorded_games/{{$recgame['slug']}}">{{ $recgame['name'] }}</a> Votes: {{$recgame['votes']}} Views: {{$recgame['views']}}
    @if(! Session::get('voted_rec_' . $recgame['id']))
        <div class="vote" style="display: inline-block;">
        {!! Form::open(array('route' => array('recs.upvote', $recgame['slug']), 'method' => 'PATCH')) !!}
        <button type="submit" class="btn btn-default" style="border: 0; background: transparent; color: #ff0000;"><i class="fa fa-angle-double-up"></i></button>
        {!! Form::close() !!}
        </div>
            <div class="vote" style="display: inline-block;">
        {!! Form::open(array('route' => array('recs.downvote', $recgame['slug'],), 'method' => 'PATCH')) !!}
        <button type="submit" class="btn btn-default" style="border: 0; background: transparent; color: #ff0000;"><i class="fa fa-angle-double-down"></i></button>
        {!! Form::close() !!}
            </div>
    @endif
    </li>
        @endforeach
    </ul>
        <br>
    <div class="youtube_links">
        <h4>Youtube Videos:</h4>
        <ul>
        @foreach($videos as $video)
            <li><a href="{{$video['link']}}" target="_blank">{{$video['name']}}</a> - By: <small>{{$video['author']}}</small></li>
            @endforeach
        </ul>
    </div>
    <br>
    <br>
    {!! link_to_route('gods.index','Back to gods overview') !!}
@stop