<!-- Navbar -->
<nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <!--Left side Navigation -->
            <ul class="nav navbar-nav">
                <li {{ (Request::is('/') ? 'class=active' : '') }}><a href="/">Home</a></li>
                <li {{ (Request::is('gods*') ? 'class=active' : '') }}><a href="{{ URL::to('/gods') }}">Gods</a></li>
                <li {{ (Request::is('guides*') ? 'class=active' : '') }}><a href="{{ URL::to('/guides') }}">Guides</a></li>
                <li {{ (Request::is('recorded_games*') ? 'class=active' : '') }}><a href="{{ URL::to('/recorded_games') }}">Recorded Games</a></li>
                <li {{ (Request::is('tools*') ? 'class=active' : '') }}><a href="{{ URL::to('/tools') }}">Tools & Mods</a></li>
                <li {{ (Request::is('clans*') ? 'class=active' : '') }}><a href="{{ URL::to('/clans') }}">Clans</a></li>
                <li {{ (Request::is('contact_us*') ? 'class=active' : '') }}><a href="{{ URL::to('/contact_us') }}">Contact Us</a></li>
            </ul>
            <!--Right side Navigation -->
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li><a href="{{ URL::to('/auth/logout') }}">logout</a></li>
                @else
                    @include('layouts.login')
                <li><a href="{{ URL::to('/auth/register') }}">register</a></li>
                    @endif
            </ul>
        </div><!--/.nav-collapse -->
</nav>
<!-- ./ navbar -->