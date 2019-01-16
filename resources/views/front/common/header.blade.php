<!DOCTYPE HTML>
<html>
<head>
    <title>WATCHMe [ Sample Movie Booking System ] </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="/front/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="/front/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="/front/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="/front/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <!-- Meters graphs -->
    <script src="/front/js/jquery-1.10.2.min.js"></script>

    <meta property="og:url"           content="http://watchme.app/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Watch Me" />
    <meta property="og:description"   content="Enjoy Yourself" />
    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />

</head>

<body class="sticky-header left-side-collapsed"  onload="start()">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <h1><a href="{{ url('') }}">WATCHMe<span></span></a></h1>
        </div>

        <div class="logo-icon text-center">
            <a href="{{ url('') }}">W </a>
        </div>

        <!--logo and iconic logo end-->
        <div class="left-side-inner">

            <!--sidebar nav start-->
            <!-- https://linearicons.com/free -->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="{{ url('') }}"><i class="lnr lnr-home"></i><span>Home</span></a></li>

                <li><a href="{{ url('theatre') }}"><i class="lnr lnr-screen"></i> <span>Cinema</span></a></li>

                <li><a href="{{ url('trailer') }}"><i class="lnr lnr-film-play"></i> <span> All Trailers </span></a></li>

                <li><a href="{{ url('movie') }}"><i class="lnr lnr-eye"></i> <span>All Movies</span></a></li>

                <li><a href="{{ url('#') }}"><i class="lnr lnr-map-marker"></i><span>Location</span></a></li>

                <li><a href="{{ url('#') }}"><i class="lnr lnr-menu"></i> <span>Genre</span></a></li>

                <li><a href="{{ url('help') }}"><i class="lnr lnr-question-circle"></i><span>Help</span></a></li>

                <li><a href="{{ url('about_us') }}"><i class="lnr lnr-users"></i> <span>About Us</span></a></li>

                <li><a href="{{ url('contact_us') }}"><i class="lnr lnr-phone-handset"></i>  <span>Contact Us</span></a></li>
            </ul>
            <!--sidebar nav end-->
        </div>
    </div>
    <!-- left side end-->
    <!-- app-->

    <!-- //signup -->

    <!-- main content start-->
    <div class="main-content">
        <!-- header-starts -->
        <div class="header-section">
            <!--toggle button start-->
            <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->
            <!--notification menu start -->
            <div class="menu-right">
                <div class="profile_details">

                    <!-- search-scripts -->
                    <script src="/front/js/classie.js"></script>
                    <script src="/front/js/uisearch.js"></script>
                    <script>
                        new UISearch( document.getElementById( 'sb-search' ) );
                    </script>
                    <!-- //search-scripts -->
                    <!---->
                    <div class="col-md-8"></div>

                    <div class="col-md-3 login-pop">
                        <div id="loginpop"><a href="#" id="loginButton"><span>Login <i class="arrow glyphicon glyphicon-chevron-right"></i></span></a>
                            <a class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"><i class="fa fa-sign-in"></i></a>
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
                                        <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                                    </fieldset>
                                    <span><a href="#">Forgot your password?</a></span>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!-------->
            </div>
            <div class="clearfix"></div>
        </div>