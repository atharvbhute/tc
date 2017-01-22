@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">

                    @foreach($events as $event)
                        <a href="{{route('entries',['id'=>$event->id])}}">
                            <div class="col-sm-6 col-xs-12 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{$event->picture}}" alt="...">
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
