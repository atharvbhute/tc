@extends('layouts.app')
@section('title')
    thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <section class="workshops endless-pagination" data-next-page="{{ $workshops->nextPageUrl() }}">
                        @foreach($workshops as $workshop)
                            <a href="{{route('workshop',['id'=>$workshop->id])}}">
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{$workshop->picture}}-/resize/335x188/" alt="...">
                                        <div class="caption">
                                            <p><Strong>Name: </Strong>{{$workshop->name}}</p>
                                            <p><Strong>Organiser: </Strong>{{$workshop->organiser}}</p>
                                            <p><Strong>Date: </Strong>{{$workshop->date}}</p>
                                            <p><Strong>Address: </Strong>{{$workshop->address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </section>


                    <script>

                        $(document).ready(function() {

                            $(window).scroll(function(){
                                var page = $('.endless-pagination').data('next-page');

                                if(page !== null) {

                                    clearTimeout( $.data( this, "scrollCheck" ) );

                                    $.data( this, "scrollCheck", setTimeout(function() {
                                        var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

                                        if(scroll_position_for_posts_load >= $(document).height()) {
                                            $.get(page, function(data){
                                                $('.workshops').append(data.workshops);
                                                $('.endless-pagination').data('next-page', data.next_page);
                                            });
                                        }
                                    }, 350))

                                }
                            });

                        })

                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
