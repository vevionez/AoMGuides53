@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Homepage
@stop
@section('description')
    @parent
    AomGuides, The place to be for all your Age of Mythology Information and guidance!
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="jumbotron">
                <h2>
                    Hello, Aom Enthusiasts!
                </h2>
                <p>
                    This website aims to provide the most up to date and highest quality information for Age of Mythology. Everything is user-contributed, and I the owner of this site have not made all these guides/recorded games/tools/mods myself. Credits to the respectful owners.
                </p>
                <p>
                    Would you like to contribute? Make sure to register <a href="http://aomguides.com/register">Here</a> and contact us using the contact form <a href="http://aomguides.com/contact_us">Here</a>. If you simply have suggestions for the site, do not hesitate to take contact either! This website is for the community, by the community, in the hopes that one day AoM will be as active and amazing as it once was.
                </p>
                @if(Auth::check())
                    @if(Auth::user()->admin)
                        Hello big boy, I see you are logged in!
                    @endif
                @endif
            </div>
        </div>
        @include('layouts.sidebar')
    </div>
@stop