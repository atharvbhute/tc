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
<body>
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
                    <strong>thecompete</strong>(<small>beta</small>)
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
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    About<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                    <li>
                    <a href="{{route('about')}}">
                    About
                    </a>
                    </li>

                    <li>
                    <a href="{{ route('contact') }}">
                    Contact Us
                    </a>

                    </li>
                    </ul>
                    </li>

                    <li><a href="{{ url('/upload') }}">Upload Competition</a></li>

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

</div>

<footer class="footer bg-primary">
    <div class="container">
        <strong>A Atharv Bhute production</strong>
        <br>
        <strong style="padding-left:1em">thecompete © 2017</strong>
    </div>
</footer>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
