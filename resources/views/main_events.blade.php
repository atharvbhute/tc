@extends('layouts.app')
@section('title')
    thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    @foreach($main_events as $main_event)

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="hovereffect">
                                <img class="img-responsive" src="{{$main_event->picture}}" alt="">
                                <div class="overlay">
                                    <h2>{{$main_event->name}}  - {{$main_event->organiser}}</h2>
                                    <a class="info" href="{{route('main_event',['id'=>$main_event->id])}}")}}">click hear to see all sub events</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <style type="text/css">
                        .hovereffect {
                            width: 100%;
                            height: 100%;
                            float: left;
                            overflow: hidden;
                            position: relative;
                            text-align: center;
                            cursor: default;
                        }

                        .hovereffect .overlay {
                            width: 100%;
                            height: 100%;
                            position: absolute;
                            overflow: hidden;
                            top: 0;
                            left: 0;
                            background-color: rgba(75,75,75,0.7);
                            -webkit-transition: all 0.4s ease-in-out;
                            transition: all 0.4s ease-in-out;
                        }

                        .hovereffect:hover .overlay {
                            background-color: rgba(48, 152, 157, 0.4);
                        }

                        .hovereffect img {
                            display: block;
                            position: relative;
                        }

                        .hovereffect h2 {
                            text-transform: uppercase;
                            color: #fff;
                            text-align: center;
                            position: relative;
                            font-size: 17px;
                            padding: 10px;
                            background: rgba(0, 0, 0, 0.6);
                            -webkit-transform: translateY(45px);
                            -ms-transform: translateY(45px);
                            transform: translateY(45px);
                            -webkit-transition: all 0.4s ease-in-out;
                            transition: all 0.4s ease-in-out;
                        }

                        .hovereffect:hover h2 {
                            -webkit-transform: translateY(5px);
                            -ms-transform: translateY(5px);
                            transform: translateY(5px);
                        }

                        .hovereffect a.info {
                            display: inline-block;
                            text-decoration: none;
                            padding: 7px 14px;
                            text-transform: uppercase;
                            color: #fff;
                            border: 1px solid #fff;
                            background-color: transparent;
                            opacity: 0;
                            filter: alpha(opacity=0);
                            -webkit-transform: scale(0);
                            -ms-transform: scale(0);
                            transform: scale(0);
                            -webkit-transition: all 0.4s ease-in-out;
                            transition: all 0.4s ease-in-out;
                            font-weight: normal;
                            margin: -52px 0 0 0;
                            padding: 62px 100px;
                        }

                        .hovereffect:hover a.info {
                            opacity: 1;
                            filter: alpha(opacity=100);
                            -webkit-transform: scale(1);
                            -ms-transform: scale(1);
                            transform: scale(1);
                        }

                        .hovereffect a.info:hover {
                            box-shadow: 0 0 5px #fff;
                        }
                    </style>

                    {{--<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">--}}
                        {{--<div class="col-md-offset-4 col-sm-offset-2 col-lg-offset-4 bottom">{{$events->links()}}</div>--}}
                    {{--</div>--}}



                    {{--<script>--}}

                    {{--$(document).ready(function() {--}}

                    {{--$(window).scroll(function(){--}}
                    {{--var page = $('.endless-pagination').data('next-page');--}}

                    {{--if(page !== null) {--}}

                    {{--clearTimeout( $.data( this, "scrollCheck" ) );--}}

                    {{--$.data( this, "scrollCheck", setTimeout(function() {--}}
                    {{--var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;--}}

                    {{--if(scroll_position_for_posts_load >= $(document).height()) {--}}
                    {{--$.get(page, function(data){--}}
                    {{--$('.events').append(data.events);--}}
                    {{--$('.endless-pagination').data('next-page', data.next_page);--}}
                    {{--});--}}
                    {{--}--}}
                    {{--}, 350))--}}

                    {{--}--}}
                    {{--});--}}

                    {{--})--}}

                    {{--</script>--}}

                </div>
        </div>
    </div>
@endsection
