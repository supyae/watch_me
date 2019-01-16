@include('front.common.header')

{{--<div class="main-content">--}}

<div id="page-wrapper">
    <div class="inner-content">
        <!-- /blog -->
        <div class="tittle-head">
            <h3 style="color: floralwhite">All Cinema</h3>

            <div class="clearfix"></div>
        </div>
        <!-- /music-left -->
        <div class="">
            <div class="review-slider">
                <div class="tittle-head">
                    <h3 class="tittle">All Cinema <span class="new"> View List</span></h3>

                    <div class="clearfix"></div>
                </div>
                <ul id="flexiselDemo1">

                    @foreach($data as $d)
                        <li>
                            <a href="#"><img width="233" height="233" src={{ $d->theatre_img }} alt=""/></a>

                            <div class="slide-title"><h4>{{ $d->name }} </h4></div>
                            <div class="date-city">
                                <h5>{{ $d->township->name }}</h5>

                                {{--<div class="buy-tickets">--}}
                                {{--<a href="#">READ MORE</a>--}}
                                {{--</div>--}}
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
                            <th>Cinema</th>
                            <th>Address</th>
                            <th>Township</th>
                            <th>Min Pricer Per Seat</th>
                            <th>Max Pricer Per Seat</th>
                            <th>#</th>

                            @foreach($data as $key=>$d)
                                <tr>
                                    <td> {{ $d->name}}</td>
                                    <td> {{ $d->address }} </td>
                                    <td> {{ $d->township->name }}</td>
                                    <td> {{ $d->theatre_class[0]->min_price }}</td>
                                    <td> {{ $d->theatre_class[0]->max_price }}</td>
                                    <td>{{ $key }}
                                        <a href="#" data-toggle="modal" data-target="#myModal{{$key}}"><i
                                                    class="glyphicon glyphicon-map-marker"></i>View Map</a>

                                        &nbsp; &nbsp;

                                        {!! Html::linkRoute('section/show_by_theatre','Show Section',
                                        ['theatre_id' => $d->id],
                                        ['class' => 'btn btn-round btn-default']) !!}
                                    </td>
                                </tr>

                                <div class="modal fade" id="myModal{{$key}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog facebook" role="document" style="width:660px;">
                                        <div class="modal-content">
                                            <div class="modal-header"> </div>
                                            <div class="modal-body">
                                                <div class="app-grids">
                                                    <div class="app">
                                                        <?php echo $d->maps;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeac=8

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