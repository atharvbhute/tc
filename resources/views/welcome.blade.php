@extends('layouts.app')
@section('title')
    thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{url("/hot_event")}}" class="list-group-item"><p class="bg bg-danger">HOT</p></a>
                    <a href="{{url("/main_events")}}" class="list-group-item">MAIN EVENTS</a>
                </div>
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

                @foreach(\App\Category::all() as $category)
                            <a href="{{url("/category/$category->id")}}" class="list-group-item">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                @include('partials.flash')

                <style type="text/css">
                    .thumbnail.right-caption > img {
                        float: left;
                        margin-right: 9px;
                    }

                    .thumbnail.right-caption {
                        float: left;
                    }

                    .thumbnail.right-caption > .caption {
                        padding: 4px;
                    }
                    ​
                </style>

                @foreach(App\Event::where('name','=','National Level Conference')->get() as $national_conference)
                    <a href="{{route('event',['id'=>$national_conference->id])}}">
                        <div class="col-md-12">
                            <div class="thumbnail col-md-12 right-caption span4">
                                <img src="{{$national_conference->picture}}-/resize/335x188/" alt="...">
                                <div class="caption bg-danger">
                                    <p><Strong>Name: </Strong>{{$national_conference->name}}</p>
                                    <p><Strong>Organiser: </Strong>{{$national_conference->organiser}}</p>
                                    <p><Strong>Date: </Strong>{{$national_conference->date}}</p>
                                    <p><Strong>Address: </Strong>{{$national_conference->address}}</p>
                                </div>
                            </div>
                        </div>
                        <style type="text/css">
                            .thumbnail.right-caption > img {
                                float: left;
                                margin-right: 9px;
                            }

                            .thumbnail.right-caption {
                                float: left;
                            }

                            .thumbnail.right-caption > .caption {
                                padding: 4px;
                            }
                            ​
                        </style>
                    </a>
                @endforeach

    @foreach($events as $event)
        <a href="{{route('event',['id'=>$event->id])}}">
            <div class="col-sm-6 col-xs-12 col-md-4">
                <div class="thumbnail">
                    <img src="{{$event->picture}}-/resize/335x188/" alt="...">
                    <div class="caption bg-info">
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
