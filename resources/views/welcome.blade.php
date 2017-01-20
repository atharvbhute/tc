@extends('layouts.app')
@section('content')
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"> Event </h3>
                </div>
                <div class="modal-body">
                    <img src="{{$event->picture}}" alt="...">
                    <div class="caption">
                        <p><Strong>Name: </Strong>{{$event->name}}</p>
                        <p><Strong>Organiser: </Strong>{{$event->organiser}}</p>
                        <p><Strong>Date: </Strong>{{$event->date}}</p>
                        <p><Strong>Address: </Strong>{{$event->address}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-sm-6">
                        <button class="btn btn-danger">close</button>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary">Go To Event</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    @foreach($events as $event)
                    <a href="#" data-toggle="modal" data-target="#eventModal">
                    <div class="col-sm-6 col-md-4">
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
