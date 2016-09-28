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
            @if($aomeestreams['_total'] != 0)
            @foreach($aomeestreams['streams'] as $stream)
                <ul>
                    <li>
                        Streamer: {{ $stream['channel']['display_name']  }}
                    </li>
                    <li>
                        status: {{ $stream['channel']['status']  }}
                    </li>
                    <li>Viewers: {{ $stream['channel']['views'] }}</li>
                    <li>Followers: {{ $stream['channel']['followers'] }}</li>
                    <li>
                        url: <a href="{{ $stream['channel']['url']  }}">{{ $stream['channel']['url']  }}</a>
                    </li>
                </ul>
                    <button id='watch'>Watch Live!</button>";
                    <div id='twitchtoggle' style='display: none'>
                        <iframe id='twitchstream' frameborder='0' scrolling='no' height='378' width='620'></iframe>
                        <div id='chat'>
                            <iframe id='twitchchat' frameborder='0' scrolling='no' class='chat_embed' height='400' width='500'></iframe>
                        </div>
                    </div>

                @endforeach
            @endif
            <pre>
            {{ var_dump($aomeestreams) }}
                </pre>
            <h2>AOM:TT Streams:</h2>
            @if($aomttstreams['_total'] != 0)
                @foreach($aomttstreams['streams'] as $stream)
                    <ul>
                        <li>
                            Streamer: {{ $stream['channel']['display_name']  }}
                        </li>
                        <li>
                            status: {{ $stream['channel']['status']  }}
                        </li>
                        <li>Viewers: {{ $stream['channel']['views'] }}</li>
                        <li>Followers: {{ $stream['channel']['followers'] }}</li>
                        <li>
                            url: <a href="{{ $stream['channel']['url']  }}">{{ $stream['channel']['url']  }}</a>
                        </li>
                    </ul>
                    <button id='watch'>Watch Live!</button>";
                    <div id='twitchtoggle' style='display: none'>
                        <iframe id='twitchstream' frameborder='0' scrolling='no' height='378' width='620'></iframe>
                        <div id='chat'>
                            <iframe id='twitchchat' frameborder='0' scrolling='no' class='chat_embed' height='400' width='500'></iframe>
                        </div>
                    </div>
                @endforeach
            @endif

            <pre>
            {{ var_dump($aomttstreams) }}
            </pre>
            <h2>AOM Vanilla Streams:</h2>
            @if($aomstreams['_total'] != 0)
                @foreach($aomstreams['streams'] as $stream)
                    <ul>
                        <li>
                            Streamer: {{ $stream['channel']['display_name']  }}
                        </li>
                        <li>
                            status: {{ $stream['channel']['status']  }}
                        </li>
                        <li>Viewers: {{ $stream['channel']['views'] }}</li>
                        <li>Followers: {{ $stream['channel']['followers'] }}</li>
                        <li>
                            url: <a href="{{ $stream['channel']['url']  }}">{{ $stream['channel']['url']  }}</a>
                        </li>
                    </ul>
                    <button id='watch'>Watch Live!</button>";
                    <div id='twitchtoggle' style='display: none'>
                        <iframe id='twitchstream' frameborder='0' scrolling='no' height='378' width='620'></iframe>
                        <div id='chat'>
                            <iframe id='twitchchat' frameborder='0' scrolling='no' class='chat_embed' height='400' width='500'></iframe>
                        </div>
                    </div>
                @endforeach
            @endif

            <pre>
            {{ var_dump($aomstreams) }}
            </pre>
        </div>
    </div>
@stop