@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    @include('partials.flash')
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
                                    @if($event->verified)
                                        <p class="bg-success">verified</p>
                                    @else
                                        <p class="bg-danger">unverified( it will verify once it check by us) or it's outdated </p>
                                    @endif
                                    <hr>
                                        <a href="{{route('deleteEvent',['id'=>$event->id])}}"><button class="btn btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
