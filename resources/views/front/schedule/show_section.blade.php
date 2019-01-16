@include('front.common.header')

{{--<div class="main-content">--}}

<div id="page-wrapper">
    <div class="inner-content">
        <!-- /blog -->
        <div class="tittle-head">
            <h3 style="color: floralwhite">Our Schedule </h3>

            <div class="clearfix"></div>
        </div>
        <!-- /music-left -->
        <div class="">
            <div class="post-media">
                <table>
                    <tr>

                        <td width="50%">
                            <img width="90%" height="30%" src="{{ $movie->movie_img }}" class="img-responsive"
                                 alt=""/>
                        </td>

                        <td width="50%">

                            <div class="" style="width: 98%;height:100%; margin-right: 0;padding-top: 0">
                                <a href="single.html"><h3 class="h-t"
                                                          style="color: floralwhite">{{ $movie->movie_name }}</h3></a>

                                <div class="entry-meta">
                                    <h6 class="blg" style="color: floralwhite"><i class="fa fa-clock-o"></i> Release
                                        Date
                                        ~ {{ $movie->release_date }}</h6>

                                    {{--<div class="icons">--}}
                                    {{--<a href="#"><i class="fa fa-user"></i> Admin</a>--}}
                                    {{--<a href="#"><i class="fa fa-comments-o"></i> 2</a>--}}
                                    {{--<a href="#"><i class="fa fa-thumbs-o-up"></i> 152</a>--}}
                                    {{--<a href="#"><i class="fa fa-thumbs-o-down"></i> 26</a>--}}
                                    {{--</div>--}}
                                    <div class="clearfix"></div>
                                    <p style="color: floralwhite">{{ $movie->description }}</p>
                                </div>
                            </div>

                        </td>

                    </tr>
                </table>


            </div>
            <div class="post-media second">

                <div class="blog-text">
                    <a href="#"><h3 class="h-t">Available Section</h3></a>

                    <div class="entry-meta">

                        <div class="clearfix"></div>


                        @if(sizeof($data) < 1)

                            <h3><span class="alert alert-danger"> There is no available sections ! </span></h3>

                        @else
                            <table class="table border-aero">
                                <th>Cinema</th>
                                <th>Location</th>
                                <th>Show Date</th>
                                <th>TimeTable</th>
                                <th>#</th>

                                @foreach($data as $d)
                                    <tr>
                                        <td> {{ $d->theatre_name }}</td>
                                        <td> {{ $d->township }} </td>
                                        <td> {{ $d->show_date }}</td>
                                        <td> {{ $d->start_time }} ~ {{ $d->end_time }}</td>
                                        <td>
                                            {!! Html::linkRoute('section/show_seat','Choose Seat',
                                            ['available_id' => $d->available_id, 'theatre_id' => $d->theatre_id],
                                            ['class' => 'btn btn-round btn-default']) !!}
                                        </td>
                                    </tr>
                                @endforeach

                                @endif
                            </table>
                    </div>
                </div>
            </div>

        </div>


        <div class="clearfix"></div>
        <!--body wrapper end-->

    </div>
    {{--</div>--}}

@include('front.common.footer')