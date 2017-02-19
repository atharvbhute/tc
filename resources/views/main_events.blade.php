@extends('layouts.app')
@section('title')
    thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <p class="lead hidden-sm hidden-xs">Categories</p>
                    <div class="form-group hidden-md hidden-lg">
                        <div >
                            <select placeholder="select category" name="" id="" class="form-control" onchange="location = this.value;">
                                @foreach(\App\Category::all() as $category)
                                    <option value="{{url("/category/$category->id")}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="list-group hidden-sm hidden-xs">
                        <a href="{{url("/main_events")}}" class="list-group-item">MAIN EVENTS</a>
                        <br>
                        <br>
                        <br>
                        @foreach(\App\Category::all() as $category)
                            <a href="{{url("/category/$category->id")}}" class="list-group-item">{{$category->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    @include('partials.flash')

                    @foreach($main_events as $main_event)
                        <a href="{{route('main_event',['id'=>$main_event->id])}}">
                            <div class="col-sm-12 col-xs-12 col-md-6">
                                <div class="thumbnail">
                                    <img src="{{$main_event->picture}}-/resize/335x188/" alt="...">
                                    <div class="caption">
                                        <p><Strong>Name: </Strong>{{$main_event->name}}</p>
                                        <p><Strong>Organiser: </Strong>{{$main_event->organiser}}</p>
                                        {{--<p><Strong>Address: </Strong>{{$event->address}}</p>--}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach

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
    </div>
@endsection
