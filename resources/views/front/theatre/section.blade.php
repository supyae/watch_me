@include('front.common.header')

{{--<div class="main-content">--}}

<div id="page-wrapper">
    <div class="inner-content">
        <!-- /blog -->
        <div class="tittle-head">
            <h3 style="color: floralwhite">Available Section </h3>

            <div class="clearfix"></div>
        </div>
        <!-- /music-left -->
        <div class="">
            <div class="post-media">
                <table>
                    <tr>

                        <td width="50%">
                            <img width="90%" height="25%" src="{{ $theatre[0]->theatre_img }}" class="img-responsive"
                                 alt=""/>
                        </td>

                        <td width="50%">

                            <div class="" style="width: 98%;height:100%; margin-right: 0;padding-top: 0">
                                <a href="#"><h3 class="h-t"
                                                          style="color: floralwhite">{{ $theatre[0]->name }}</h3></a>

                                <div class="entry-meta">

                                    <h6 class="blg" style="color: floralwhite"><i class="fa fa-clock-o"></i>
                                        Location {{ $theatre[0]->township->name }}
                                    </h6>

                                </div>
                            </div>

                        </td>

                    </tr>
                </table>


            </div>
            <div class="post-media second">

                <div class="blog-text">
                    <a href="single.html"><h3 class="h-t">Available Section</h3></a>

                    <div class="entry-meta">

                        <div class="clearfix"></div>
                        <table class="table border-aero">
                            <tr>
                                <th> Movie Name</th>
                                <th colspan="3"> Section</th>
                            </tr>

                            @foreach($data as $d)

                                    <td width="20%"> {{ $d->movie->movie_name }}
                                        <table><tr><td> <img src="{{ $d->movie->movie_img }}" width="300px" height="200px"></td></tr></table>

                                    </td>
                                    <td> @if(sizeof($d->available))
                                            <table class="table table-striped">
                                                <tr>
                                                    <th> Show Date</th>
                                                    <th> Time</th>
                                                    <th> Remaining Seat</th>
                                                    <th> # </th>
                                                </tr>
                                                @foreach($d->available as $ava)
                                                    <tr>
                                                        <td>
                                                            {{ $ava->show_date }}
                                                        </td>
                                                        <td>
                                                            {{ $ava->timetable->start_time }}
                                                            ~ {{ $ava->timetable->end_time }}
                                                        </td>
                                                        <td> {{ $ava->available_seat }}</td>
                                                        <td>
                                                            <a href="{{ url('section/show_seat', ['available_id' => $ava->id, 'theatre_id' =>  $theatre[0]->id] ) }}"
                                                               class="btn btn-round btn-default">
                                                                 Choose Seat
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- //music-left-->
        {{--<!-- /music-right-->--}}
        {{--<div class="music-right">--}}
        {{--<!-- //widget -->--}}
        {{--<div class="widget-side">--}}
        {{--<h4 class="widget-title">Recent Posts</h4>--}}
        {{--<ul>--}}
        {{--<li>--}}
        {{--<a href="single.html">Taylor Swift – Shake It Off</a>--}}
        {{--<span class="post-date">Feb 13, 2016</span>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="single.html">Love Me Like You Do – Ellie Goulding (Fifty Shades of Grey Soundtrack)--}}
        {{--HQ</a>--}}
        {{--<span class="post-date">Feb 14, 2016</span>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="single.html">Jessie J – Flashlight (from Pitch Perfect 2)</a>--}}
        {{--<span class="post-date">Feb 16, 2016</span>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="single.html">Sol – “Ain’t Gon’ Stop”</a>--}}
        {{--<span class="post-date">Feb 18, 2016</span>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="single.html">Eminem – No Love (Explicit Version) ft. Lil Wayne</a>--}}
        {{--<span class="post-date">Feb 19, 2016</span>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}

        {{--<!-- //widget -->--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--<!-- //blog -->--}}
        {{--</div>--}}
        <div class="clearfix"></div>
        <!--body wrapper end-->

    </div>
    {{--</div>--}}

@include('front.common.footer')