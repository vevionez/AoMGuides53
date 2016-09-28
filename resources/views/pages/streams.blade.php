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
            @if($aomeestreams["_total"] > 0)
            @foreach($aomeestreams["streams"] as $stream)
                <ul>
                    <li>
                        Streamer: {{ $stream["channel"]["display_name"]  }}
                    </li>
                    <li>
                        status: {{ $stream["channel"]["status"]  }}
                    </li>
                    <li>
                        url: {{ $stream["channel"]["url"]  }}
                    </li>
                </ul>

                @endforeach
            @endif
            <pre>
            {{ var_dump($aomeestreams) }}
                </pre>
            <h2>AOM:TT Streams:</h2>
            <pre>
            {{ var_dump($aomttstreams) }}
            </pre>
        </div>
    </div>
@stop