@include('front.common.header')

        <!-- main content start-->

<!--notification menu end -->
<!-- //header-ends -->

<!-- //header-ends -->
<div id="page-wrapper">
    <div class="inner-content">
        <div class="music-browse">
            <!--albums-->
            <!-- pop-up-box -->
            <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
            <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
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
            <div class="browse">
                <div class="tittle-head two">
                    <h3 class="tittle"> All Trailers </h3>
                    <a href="browse.html"><h4 class="tittle third">See all</h4></a>

                    <div class="clearfix"></div>
                </div>

                @foreach($data as $key=>$d)

                    <div class="col-md-3 browse-grid">

                        <a href="#" data-toggle="modal" data-target="#myModal{{$key}}">
                            <img src="{{ $d->movie_img }}" title="allbum-name" width="300px" height="150px">
                        </a>
                        <a href="#" data-toggle="modal" data-target="#myModal{{$key}}"><i
                                    class="glyphicon glyphicon-play-circle"></i></a>
                        <a class="sing" href="#" data-toggle="modal" data-target="#myModal{{$key}}">
                                <span style="font-size: 10pt;width: 100%;height:20%;">
                                    {{ $d->movie_name }} </span>
                        </a>


                    </div>


                    <div class="modal fade" id="myModal{{$key}}" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog facebook" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="app-grids">
                                        <div class="app">
                                            <iframe width="690" height="400" src="{{ $d->trailer }}" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach

                <div class="clearfix"></div>
            </div>

            <!--//End-albums-->
            <!--//discover-view-->
            <!--//music-left-->
        </div>
        <!--body wrapper start-->

    </div>
    <div class="clearfix"></div>
    <!--body wrapper end-->

</div>
<!--body wrapper end-->
<div class="footer two">
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

        <p class="footer_desc">Diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat
            enim ad minim veniam,.</p>

        <p class="f_text">Phone: &nbsp;&nbsp;&nbsp;00-250-2131</p>

        <p class="email">Email : &nbsp;<span><a href="mailto:mail@example.com">info(at)mailing.com</a></span></p>
    </div>
    <div class="clearfix"></div>
</div>

@include('front.common.footer')