@include('front.common.header')

{{--<div class="main-content">--}}

<div id="page-wrapper">
    <div class="inner-content">
        <!-- /blog -->
        <div class="tittle-head">
            <h3 style="color: floralwhite">All Movies</h3>

            <div class="clearfix"></div>
        </div>
        <!-- /music-left -->
        <div class="">
            <div class="review-slider">
                <div class="tittle-head">
                    <h3 class="tittle">All Movies <span class="new"> View List</span></h3>

                    <div class="clearfix"></div>
                </div>
                <ul id="flexiselDemo1">

                    @foreach($data as $d)
                        <li>
                            <a href="#"><img width="233" height="233" src={{ $d->movie_img }} alt=""/></a>

                            <div class="slide-title"><h4>{{ $d->movie_name }} </h4></div>
                            <div class="date-city">
                                <h5>{{ $d->genre->name }}</h5>
                            </div>
                        </li>
                    @endforeach

                </ul>

                <script type="text/javascript">
                    $(window).load(function () {

                        $("#flexiselDemo1").flexisel({
                            visibleItems: 5,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: false,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint: 480,
                                    visibleItems: 2
                                },
                                landscape: {
                                    changePoint: 640,
                                    visibleItems: 3
                                },
                                tablet: {
                                    changePoint: 800,
                                    visibleItems: 4
                                }
                            }
                        });
                    });
                </script>
                <script type="text/javascript" src="/front/js/jquery.flexisel.js"></script>
            </div>


            <div class="post-media second">

                <div class="blog-text">
                    <a href="#"><h3 class="h-t">Available Cinema</h3></a>

                    <div class="entry-meta">

                        <div class="clearfix"></div>
                        <table class="table border-aero">
                            <th>Movie</th>
                            <th>Genre</th>
                            <th>Actor</th>
                            <th>Director</th>
                            <th>#</th>

                            @foreach($data as $d)
                                <tr>
                                    <td> {{ $d->movie_name }}</td>
                                    <td> {{ $d->genre->name }}</td>
                                    <td> {{ $d->actor }}</td>
                                    <td> {{ $d->director }}</td>
                                    <td>
                                        {!! Html::linkRoute('section/show_by_movie','Show Section',
                                        ['movie_id' => $d->id],
                                        ['class' => 'btn btn-round btn-default']) !!}
                                    </td>

                                </tr>

                            @endforeach


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