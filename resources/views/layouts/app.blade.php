<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src='http://connect.facebook.net/en_US/all.js'></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @yield('script')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-91715023-1', 'auto');
        ga('send', 'pageview');

    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1198707556849748',
                xfbml      : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body style="background-color: #f6f1fb">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>thecompete </strong>(<small>beta</small>)
                </a>

                {{--<div class="navbar-brand">--}}
                    {{--<form class="navbar-form" role="search">--}}
                        {{--<div class="input-group">--}}
                            {{--<input type="text" class="form-control" placeholder="Search" name="q">--}}
                            {{--<div class="input-group-btn">--}}
                                {{--<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <div class="col-md-12">
                        {!! Form::open(['method'=>'post','action'=>'EventController@search','class'=>'navbar-form']) !!}
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                </ul>

            {{--<ul class="nav navbar-nav">--}}
            {{--&nbsp;<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
            {{--Links<span class="caret"></span>--}}
            {{--</a>--}}

            {{--<ul class="dropdown-menu" role="menu">--}}

            {{--<li>--}}
            {{--<a href="{{route('about')}}">--}}
            {{--<i style="font-size:24px" class="fa">&#xf09a;</i>--}}
            {{--</a>--}}
            {{--</li>--}}

            {{--<li>--}}
            {{--<a href="{{route('about')}}">--}}
            {{--<i style="font-size:24px" class="fa">&#xf230;</i>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--</ul>--}}

            <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">


                    <li><a href="{{ url('/main-event') }}">Upload Competition</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Sign Up</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('QrCode') }}">
                                        Qr Codes
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('dash') }}">
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</div >
<br><br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 footerleft ">
                <div class="logofooter"><strong>thecompete</strong></div>
                <p>thecompete.com helps you to find a competitions , games you love , you can easily participate in those competitions with thecompete.com ,you upload your own competitions or an college event #BeOrganiser .</p>
                <p><i class="fa fa-envelope"></i> E-mail : thecompete.com@gmail.com</p>

            </div>
            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">GENERAL LINKS</h6>
                <ul class="footer-ul">
                    <li><a href="#"> Career</a></li>
                    <li><a href="#"> Privacy Policy</a></li>
                    <li><a href="#"> Terms & Conditions</a></li>
                    <li><a href="#"> Client Gateway</a></li>
                    <li><a href="#"> Ranking</a></li>
                    <li><a href="#"> Case Studies</a></li>
                    <li><a href="#"> Frequently Ask Questions</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <div class="fb-page" data-href="https://www.facebook.com/thecompete1" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/thecompete1"><a href="https://www.facebook.com/thecompete1">Facebook</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer start from here-->

<div class="copyright">
    <div class="container">
        <div class="col-md-6">
            <p>A Atharv Bhute production .
                thecompete © 2017</p>
        </div>
        <div class="col-md-6">
            <ul class="bottom_ul">
                <li><a href="{{route('about')}}">About us</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>
            </ul>
        </div>
    </div>
</div>
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,300);
    footer { background-color:#0c1a1e; min-height:350px; font-family: 'Open Sans', sans-serif; }
    .footerleft { margin-top:50px; padding:0 36px; }
    .logofooter { margin-bottom:10px; font-size:25px; color:#fff; font-weight:700;}

    .footerleft p { color:#fff; font-size:12px !important; font-family: 'Open Sans', sans-serif; margin-bottom:15px;}
    .footerleft p i { width:20px; color:#999;}


    .paddingtop-bottom {  margin-top:50px;}
    .footer-ul { list-style-type:none;  padding-left:0px; margin-left:2px;}
    .footer-ul li { line-height:29px; font-size:12px;}
    .footer-ul li a { color:#a0a3a4; transition: color 0.2s linear 0s, background 0.2s linear 0s; }
    .footer-ul i { margin-right:10px;}
    .footer-ul li a:hover {transition: color 0.2s linear 0s, background 0.2s linear 0s; color:#ff670f; }

    .social:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
    }




    .icon-ul { list-style-type:none !important; margin:0px; padding:0px;}
    .icon-ul li { line-height:75px; width:100%; float:left;}
    .icon { float:left; margin-right:5px;}


    .copyright { min-height:40px; background-color:#000000;}
    .copyright p { text-align:left; color:#FFF; padding:10px 0; margin-bottom:0px;}
    .heading7 { font-size:21px; font-weight:700; color:#d9d6d6; margin-bottom:22px;}
    .post p { font-size:12px; color:#FFF; line-height:20px;}
    .post p span { display:block; color:#8f8f8f;}
    .bottom_ul { list-style-type:none; float:right; margin-bottom:0px;}
    .bottom_ul li { float:left; line-height:40px;}
    .bottom_ul li:after { content:"/"; color:#FFF; margin-right:8px; margin-left:8px;}
    .bottom_ul li a { color:#FFF;  font-size:12px;}
</style>
<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
