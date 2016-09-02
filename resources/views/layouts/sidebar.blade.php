<div class="col-md-4">
    <div class="sidebar-nav-fixed pull-right">
        <div class="well">
            <div class="sidebar-block featured-guides">
            <ul class="nav ">
                <div class="sidebar-header">
                <h3><li class="nav-header">Featured Guides </li></h3></div>
                    @foreach($featguides as $guide)
                        <li style="font-weight: bold;"><a href="guides/{{ $guide['slug'] }}"><i class="fa fa-star"></i> {{ $guide['name'] }}</a>
                        </li>
                @endforeach
            </ul>
                </div>
        </div>
        <div class="well">
            <div class="sidebar-block most-popular-guides">
            <ul class="nav ">
                <div class="sidebar-header">
                <h3><li class="nav-header">Top Rated Guides</li></h3></div>
                @foreach($topguides as $guide)
                    <ul class="group">
                    <li class="title text-left" ><h4><a href="guides/{{ $guide['slug'] }}">{{ $guide['name'] }}</a></h4></li>
                    <li class="download-total text-right">{{$guide->votes}} Total Votes</li>
                        </ul>
                @endforeach
                </ul>
                </div>
            </div>
        <div class="well">
            <div class="sidebar-block most-popular-guides">
            <ul class="nav ">
                <div class="sidebar-header">
                <h3><li class="nav-header">Most Popular Guides</li></h3></div>
                {{--// Names and Links--}}
                <div class="col-md-12">
                @foreach($viewguides as $guide)
                        <ul class="group">
                            {{--<li class="screenshot text-left"><img class="screenshot" src="/images/{{ $guide['image'] }}" alt="{{ $guide['name'] }}"/></li>--}}
                            <li class="title text-left" ><h4><a href="guides/{{ $guide['slug'] }}">{{ $guide['name'] }}</a></h4></li>
                            <li class="download-total text-right">{{$guide->views}} Total Views</li>
{{--                            <li class="updated text-right">Updated {{ $guide['updated_at'] }}</li>
                            <li class="updated text-right">Created {{ $guide['created_at'] }}</li>
                            <li class="grats text-right">{{$guide->votes}} Likes</li>
                            <li class="version version-up-to-date text-right">Age of Mythology: The Titans</li>--}}

                        </ul>
                @endforeach
                </div>

            </ul>
                </div>
        </div>
        <!--/.well -->
        <!-- Side Widget Well -->
    </div>
</div>