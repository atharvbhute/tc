@extends('layouts.app')
@section('title')
    thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                @foreach($events as $event)

                    <a href="{{route('event',['id'=>$event->id])}}">
                    <div class="col-sm-6 col-xs-12 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <img src="{{$event->picture}}-/resize/335x188/" alt="...">
                            <div class="caption">
                                <p><Strong>Name: </Strong>{{$event->name}}</p>
                                <p><Strong>Organiser: </Strong>{{$event->organiser}}</p>
                                <p><Strong>Date: </Strong>{{$event->date}}</p>
                                <p><Strong>Address: </Strong>{{$event->address}}</p>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
