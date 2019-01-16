<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WATCHMe! | </title>

    <!-- Bootstrap -->
    <link href="/node_modules/gentelella//vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/node_modules/gentelella//vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/node_modules/gentelella//build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">

       {{--@if(isset($errors))--}}

           {{--{{ $errors }}--}}
            {{--<div class="alert alert-danger">--}}
                {{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}

        <div class="animate form login_form" style="background: white;padding: 5%;">
            <section class="login_content">
                {!! Form::open(array('url' => 'back/postLogin','method' => 'post')) !!}
                    <h1>Administrator</h1>

                    <div>
                        <input type="email" name='email' class="form-control" placeholder="Email" required=""/>
                    </div>
                    <div>
                        <input type="password" name='password' class="form-control" placeholder="Password" required=""/>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-default submit" value="Log In">
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                {!! Form::close() !!}
            </section>
        </div>


    </div>
</div>
</body>
</html>