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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p>
                All streams are automatically pulled from twitch servers. Every single streamer that is currently streaming Age of Mythology will be listed here!
            </p>
            <h2>AOM:EE Streams:</h2>
            @if($aomeestreams['_total'] != 0)
            @foreach($aomeestreams['streams'] as $stream)
                <img src="{{$stream['preview']['medium']}}">
                    <li>
                        Streamer: {{ $stream['channel']['display_name']  }}
                    </li>
                    <li>Steam started on: {{ $stream['created_at']  }}</li>
                    <li>
                        status: {{ $stream['channel']['status']  }}
                    </li>
                    <li>Viewers: {{ $stream['viewers'] }}</li>
                    <li>Followers: {{ $stream['channel']['followers'] }}</li>
                    <li>
                        url: <a href="{{ $stream['channel']['url']  }}" target="_blank">{{ $stream['channel']['url']  }}</a>
                    </li>
                </ul>
                    <a href="{{ $stream['channel']['url']  }}/embed" target="twitchstream_{{$stream['_id']}}"><button id='watch' onclick="document.getElementById('twitchtoggle_{{$stream['_id']}}').setAttribute('style', '')">Watch Live!</button></a>
                    <a href="http://twitch.tv/chat/embed?channel={{$stream['channel']['name']}}&popout_chat=true" target="twitchchat_{{$stream['_id']}}"><button id='watch'>Open Chat!</button></a>
                    <div id='twitchtoggle_{{$stream['_id']}}' style="display: none" >
                        <iframe class="embed-responsive-item" name="twitchstream_{{$stream['_id']}}" id='twitchstream_{{$stream['_id']}}' scrolling='no' height='600' width='800' allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
                        <div id='chat'>
                            <iframe class="embed-responsive-item chat_embed" name="twitchchat_{{$stream['_id']}}" id='twitchchat_{{$stream['_id']}}' frameborder='0' scrolling='no'  height='600' width='800'></iframe>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
            <h2>AOM:TT Streams:</h2>
            @if($aomttstreams['_total'] != 0)
                @foreach($aomttstreams['streams'] as $stream)
                    <img src="{{$stream['preview']['medium']}}">
                    <ul>
                        <li>
                            Streamer: {{ $stream['channel']['display_name']  }}
                        </li>
                        <li>Steam started on: {{ $stream['created_at']  }}</li>
                        <li>
                            status: {{ $stream['channel']['status']  }}
                        </li>
                        <li>Viewers: {{ $stream['viewers'] }}</li>
                        <li>Followers: {{ $stream['channel']['followers'] }}</li>
                        <li>
                            url: <a href="{{ $stream['channel']['url']  }}" target="_blank">{{ $stream['channel']['url']  }}</a>
                        </li>
                    </ul>
                    <a href="{{ $stream['channel']['url']  }}/embed" target="twitchstream_{{$stream['_id']}}"><button id='watch' onclick="document.getElementById('twitchtoggle_{{$stream['_id']}}').setAttribute('style', '')">Watch Live!</button></a>
                    <a href="http://twitch.tv/chat/embed?channel={{$stream['channel']['name']}}&popout_chat=true" target="twitchchat_{{$stream['_id']}}"><button id='watch'>Open Chat!</button></a>
                    <div id='twitchtoggle_{{$stream['_id']}}' style="display: none" >
                        <iframe class="embed-responsive-item" name="twitchstream_{{$stream['_id']}}" id='twitchstream_{{$stream['_id']}}' scrolling='no' height='600' width='800' allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
                        <div id='chat'>
                            <iframe class="embed-responsive-item chat_embed" name="twitchchat_{{$stream['_id']}}" id='twitchchat_{{$stream['_id']}}' frameborder='0' scrolling='no'  height='600' width='800'></iframe>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
            <h2>AOM Vanilla Streams:</h2>
            @if($aomstreams['_total'] != 0)
                @foreach($aomstreams['streams'] as $stream)
                    <img src="{{$stream['preview']['medium']}}">
                    <ul>
                        <li>
                            Streamer: {{ $stream['channel']['display_name']  }}
                        </li>
                        <li>Steam started on: {{ $stream['created_at']  }}</li>
                        <li>
                            status: {{ $stream['channel']['status']  }}
                        </li>
                        <li>Viewers: {{ $stream['viewers'] }}</li>
                        <li>Followers: {{ $stream['channel']['followers'] }}</li>
                        <li>
                            url: <a href="{{ $stream['channel']['url']  }}" target="_blank">{{ $stream['channel']['url']  }}</a>
                        </li>
                    </ul>
                    <a href="{{ $stream['channel']['url']  }}/embed" target="twitchstream_{{$stream['_id']}}"><button id='watch' onclick="document.getElementById('twitchtoggle_{{$stream['_id']}}').setAttribute('style', '')">Watch Live!</button></a>
                    <a href="http://twitch.tv/chat/embed?channel={{$stream['channel']['name']}}&popout_chat=true" target="twitchchat_{{$stream['_id']}}"><button id='watch'>Open Chat!</button></a>
                    <div id='twitchtoggle_{{$stream['_id']}}' style="display: none" >
                        <iframe class="embed-responsive-item" name="twitchstream_{{$stream['_id']}}" id='twitchstream_{{$stream['_id']}}' scrolling='no' height='600' width='800' allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
                        <div id='chat'>
                            <iframe class="embed-responsive-item chat_embed" name="twitchchat_{{$stream['_id']}}" id='twitchchat_{{$stream['_id']}}' frameborder='0' scrolling='no'  height='600' width='800'></iframe>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
@stop