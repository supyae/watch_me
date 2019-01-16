@include('front.common.header')


        <!-- left side end-->
<!-- main content start-->
{{--<div class="main-content">--}}
<!-- header-starts -->
<div class="header-section">
    <!--toggle button start-->
    <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->
    <!--notification menu start -->
    <div class="menu-right">
        <div class="profile_details">
            <div class="col-md-4 serch-part">
                <div id="sb-search" class="sb-search">
                    <form action="#" method="post">

                        <input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"> </span>

                    </form>
                </div>
            </div>

            <!-- search-scripts -->
            <script src="/front/js/classie.js"></script>
            <script src="/front/js/uisearch.js"></script>
            <script>
                new UISearch(document.getElementById('sb-search'));
            </script>
            <!-- //search-scripts -->
            <!---->
            <div class="col-md-4 player">
                <div class="audio-player">
                    <audio id="audio-player" controls="controls">
                        <source src="/front/media/Blue Browne.ogg" type="audio/ogg"></source>
                        <source src="/front/media/Blue Browne.mp3" type="audio/mpeg"></source>
                        <source src="/front/media/Georgia.ogg" type="audio/ogg"></source>
                        <source src="/front/media/Georgia.mp3" type="audio/mpeg"></source>
                    </audio>
                </div>
                <!---->
                <script type="text/javascript">
                    $(function () {
                        $('#audio-player').mediaelementplayer({
                            alwaysShowControls: true,
                            features: ['playpause', 'progress', 'volume'],
                            audioVolume: 'horizontal',
                            iPadUseNativeControls: true,
                            iPhoneUseNativeControls: true,
                            AndroidUseNativeControls: true
                        });
                    });
                </script>
                <!--audio-->
                <link rel="stylesheet" type="text/css" media="all" href="front/css/audio.css">
                <script type="text/javascript" src="/front/js/mediaelement-and-player.min.js"></script>
                <!---->

                <!--//-->
                <ul class="next-top">
                    <li><a class="ar" href="#"> <img src="/front/images/arrow.png" alt=""/></a></li>
                    <li><a class="ar2" href="#"><img src="/front/images/arrow2.png" alt=""/></a></li>

                </ul>
            </div>
            <div class="col-md-4 login-pop">
                <div id="loginpop"><a href="#" id="loginButton"><span>Login <i
                                    class="arrow glyphicon glyphicon-chevron-right"></i></span></a><a
                            class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"><i
                                class="fa fa-sign-in"></i></a>

                    <div id="loginBox">
                        <form action="#" method="post" id="loginForm">
                            <fieldset id="body">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email">
                                </fieldset>
                                <fieldset>
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password">
                                </fieldset>
                                <input type="submit" id="login" value="Sign in">
                                <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember
                                        me</i></label>
                            </fieldset>
                            <span><a href="#">Forgot your password?</a></span>
                        </form>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>
        <!-------->
    </div>
    <div class="clearfix"></div>
</div>
<!--notification menu end -->
<!-- //header-ends -->

<!-- //header-ends -->
<div id="page-wrapper">
    <div class="inner-content">
        <div class="music-left">
            <!--banner-section-->
            <div class="banner-section">
                <div class="banner">
                    <div class="callbacks_container">
                        <ul class="rslides callbacks callbacks1" id="slider4">

                            @foreach($movie_data as $movie)
                                <li>
                                    <div class="banner-img">
                                        <img src="{{ $movie->movie_img }}" class="img-responsive" alt="" width="1280"
                                             height="720">
                                    </div>
                                    <div class="banner-info">
                                        <a class="trend" href="{{ url('section/show_by_movie', $movie->id) }}">
                                            TRENDING </a>
                                        {{--<h3>{{ $movie->movie_name }}</h3>--}}

                                        {{--<p>directed by <span>{{ $movie->director }}</span></p>--}}
                                    </div>

                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <!--banner-->
                    <script src="/front/js/responsiveslides.min.js"></script>
                    <script>
                        // You can also use "$(window).load(function() {"
                        $(function () {
                            // Slideshow 4
                            $("#slider4").responsiveSlides({
                                auto: true,
                                pager: true,
                                nav: true,
                                speed: 400,
                                namespace: "callbacks",
                                before: function () {
                                    $('.events').append("<li>before event fired.</li>");
                                },
                                after: function () {
                                    $('.events').append("<li>after event fired.</li>");
                                }
                            });

                        });
                    </script>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--//End-banner-->
            <!--albums-->
            <!-- pop-up-box -->
            <link href="/front/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
            <script src="/front/js/jquery.magnific-popup.js" type="text/javascript"></script>
            <script>
                $(document).ready(function () {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });
                });
            </script>
            <!--//pop-up-box -->
            <div class="albums">
                <div class="tittle-head">
                    <h3 class="tittle">Current Available Movies <span class="new">New</span></h3>
                    <a href="index.html"><h4 class="tittle">See all</h4></a>

                    <div class="clearfix"></div>
                </div>
                <?php $j = 1;?>
                @foreach($current as $ckey => $currents)
                    @if($j%3 == 0)
                        <?php $content_class = "col-md-3 content-grid last-grid";?>
                    @else
                        <?php $content_class = "col-md-3 content-grid";?>
                    @endif

                    <div class="{{ $content_class }}">
                        <a class="play-icon popup-with-zoom-anim" href="#small-dialog">
                            <img src="{{ $currents->movie->movie_img }}" title="allbum-name" width="189"
                                 height="169"></a>
                        <a href="{{ url('section/show_by_movie',$currents->movie->id) }}" style="color: floralwhite;">View
                            Section</a>
                    </div>
                    <div id="small-dialog" class="mfp-hide">

                        {!! $currents->movie->trailer !!}

                    </div>
                    <?php $j++;?>

                @endforeach

                <div class="clearfix"></div>
            </div>
            <!--//End-albums-->

            <!--//discover-view-->
            <div class="albums second">
                <div class="tittle-head">
                    <h3 class="tittle">Discovered By Genre <span class="new">View</span></h3>
                    <a href="index.html"><h4 class="tittle two">See all</h4></a>

                    <div class="clearfix"></div>
                </div>
                <?php $i = 1; ?>
                @foreach($all_genres as $akey => $all_genre)
                    @if($i%3 == 0)
                        <?php $content_class2 = "col-md-3 content-grid last-grid";?>
                    @else
                        <?php $content_class2 = "col-md-3 content-grid";?>
                    @endif

                    <div class="{{ $content_class2 }}">
                        <a href="single.html"><img src={{ $all_genre->movie_img }} title="allbum-name" width="189"
                                                   height="169"></a>

                        <div class="inner-info"><a href="{{ url('section/show_by_genre', $all_genre->genre->id) }}">
                                <h5>{{ $all_genre->genre->name }}</h5></a></div>
                    </div>
                    <?php $i++;?>

                @endforeach

                <div class="clearfix"></div>
            </div>
            <!--//discover-view-->
        </div>
        <!--//music-left-->
        <!--/music-right-->
        <div class="music-right">
            <div class="widget-side">

                <h3 style="color: #f0f0f0;"> Booking </h3>

                {!! Form::open(array('action'=> ['FrontEnd\Section\SectionController@show_section'],
                   'method'=>'POST', 'class'=> '','id'=> 'booking_frm')) !!}

                <h4 id="h4.-bootstrap-heading" style="color: #f3f3f3;"> Choose Movie </h4>
                {!! Form::select('movie_id',array_pluck($movie_list, 'movie_name', 'id'), null, ['class' => 'form-control']) !!}

                <h4 id="h4.-bootstrap-heading" style="color: #f3f3f3;"> Choose Date </h4>
                <input type="text" name="date" id="datepicker" class="form-control">

                <br/>
                <input type="submit" class="btn btn-default" value="Submit">
                {!! Form::close() !!}

            </div>
            <!-- //script for play-list -->

            <!--//video-main-->
            <!--/app_store-->
            <div class="apps">
                <h3 class="hd-tittle">WatchMe now available in</h3>

                <div class="banner-button">
                    <a href="#"><img src="/front/images/1.png" alt=""></a>
                </div>


                <div class="banner-button green-button">
                    <a href="#"><img src="/front/images/2.png" alt=""></a>
                </div>


                <div class="clearfix"></div>
            </div>
            <!--//app_store-->
            <!--/start-paricing-tables-->
            <div class="price-section">
                <div class="pricing-inner">
                    <h3 class="hd-tittle">Search By features</h3>

                    <div class="pricing">


                        <div class="price-top">
                            <h3><span class="fa fa-location-arrow"></span></h3>
                            <h4>Cinema</h4>
                        </div>
                        <div class="price-bottom">
                            <ul>

                                @foreach($theatre as $thea)
                                    <li><a class="icon" href="#"><i class="glyphicon glyphicon-ok"></i></a><a
                                                class="text"
                                                href="{{ url('section/show_by_theatre', $thea->id) }}">{{ $thea->name }}</a>

                                        <div class="clearfix"></div>
                                    </li>

                                @endforeach

                            </ul>
                            <a href="single.html" class="price">Upgrade</a>
                        </div>


                    </div>


                    <div class="pricing two">

                        <div class="price-top">
                            <h3><span class="fa fa-location-arrow"></span></h3>
                            <h4>Township Area</h4>
                        </div>
                        <div class="price-bottom">
                            <ul>

                                @foreach($township as $town)

                                    <li><a class="icon" href="#"><i class="glyphicon glyphicon-ok"></i></a><a
                                                class="text" href="#">{{ $town->name }}</a>

                                        <div class="clearfix"></div>
                                    </li>

                                @endforeach

                            </ul>
                            <a href="single.html" class="price">Upgrade</a>
                        </div>

                    </div>


                    <div class="clearfix"></div>
                </div>
                <!--//end-pricing-tables-->
            </div>
        </div>
        <!--//music-right-->
        <div class="clearfix"></div>

    </div>
    <!--body wrapper start-->
    <div class="review-slider">
        <div class="tittle-head">
            <h3 class="tittle">All Movie <span class="new"> View List</span></h3>

            <div class="clearfix"></div>
        </div>
        <ul id="flexiselDemo1">

            @foreach($all as $alll)

                <li>
                    <a href="#"><img width="233" height="233" src={{ $alll->movie_img }} alt=""/></a>

                    <div class="slide-title"><h4>{{ $alll->movie_name }} </h4></div>
                    <div class="date-city">
                        <h5>{{ $alll->release_date }}</h5>

                        <div class="buy-tickets">
                            <a href="#">READ MORE</a>
                        </div>
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


    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '224957457953312',
                xfbml      : true,
                version    : 'v2.8'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
    </div>

</div>

<div style="padding: 5%;">
<?php

echo '<iframe
width="100%"
height="450"
frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCRPndhHXcA8wDr3hwSoBj6JQRoecAYjNA&q=MICT+Park" allowfullscreen>
</iframe>';

?>

    </div>

<div class="clearfix"></div>
<!--body wrapper end-->


</div>
<!--body wrapper end-->
<div class="footer">
    <div class="footer-grid">
        <h3>Navigation</h3>
        <ul class="list1">
            <li><a href="index.html">Home</a></li>
            <li><a href="radio.html">All Songs</a></li>
            <li><a href="browse.html">Albums</a></li>
            <li><a href="radio.html">New Collections</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
    <div class="footer-grid">
        <h3>Our Account</h3>
        <ul class="list1">
            <li><a href="#" data-toggle="modal" data-target="#myModal5">Your Account</a></li>
            <li><a href="#">Personal information</a></li>
            <li><a href="#">Addresses</a></li>
            <li><a href="#">Discount</a></li>
            <li><a href="#">Orders history</a></li>
            <li><a href="#">Addresses</a></li>
            <li><a href="#">Search Terms</a></li>
        </ul>
    </div>
    <div class="footer-grid">
        <h3>Our Support</h3>
        <ul class="list1">
            <li><a href="contact.html">Site Map</a></li>
            <li><a href="#">Search Terms</a></li>
            <li><a href="#">Advanced Search</a></li>
            <li><a href="#">Mobile</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="#">Mobile</a></li>
            <li><a href="#">Addresses</a></li>
        </ul>
    </div>
    <div class="footer-grid">
        <h3>Newsletter</h3>

        <p class="footer_desc">Nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
            consequat</p>

        <div class="search_footer">
            <form>
                <input type="text" placeholder="Email...." required="">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div class="footer-grid footer-grid_last">
        <h3>About Us</h3>

        <p class="footer_desc">Diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat enim ad
            minim veniam,.</p>

        <p class="f_text">Phone: &nbsp;&nbsp;&nbsp;00-250-2131</p>

        <p class="email">Email : &nbsp;<span><a href="mailto:mail@example.com">info(at)mailing.com</a></span></p>
    </div>
    <div class="clearfix"></div>
</div>
{{--</div>--}}
<!--footer section start-->
<footer>
    <p>&copy 2016 Mosaic. All Rights Reserved | Design by <a href="https://w3layouts.com/"
                                                             target="_blank">w3layouts.</a></p>
</footer>
<!--footer section end-->


<script src="/front/datepicker/bootstrap-datepicker.js"></script>
<link href="/front/datepicker/datepicker.css" rel='stylesheet' type='text/css'/>
<script>
    $(document).ready(function () {
        $('#datepicker').datepicker();
    });

</script>

<!-- main content end-->
@include('front.common.footer')