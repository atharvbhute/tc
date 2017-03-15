@extends('layouts.app')
@section('title')
    thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="col-md-offset-2 col-md-8">
                    @include('partials.flash')
                    <h1 class="bg bg-danger">{{ $main_event->name or "" }}</h1>

                    @foreach($events as $event)
                        <a href="{{route('event',['id'=>$event->id])}}">
                            <div class="col-sm-6 col-xs-12 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{$event->picture}}-/resize/335x188/" alt="...">
                                    <div class="caption" style="background-color: white">
                                        <p><Strong>Name: </Strong>{{$event->name}}</p>
                                        <p><Strong>Organiser: </Strong>{{$event->organiser}}</p>
                                        <p><Strong>Date: </Strong>{{$event->date}}</p>
                                        {{--<p><Strong>Address: </Strong>{{$event->address}}</p>--}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <div class="col-md-offset-4 col-sm-offset-2 col-lg-offset-4 bottom">{{$events->links()}}</div>
                    </div>



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
    </div>
@endsection
