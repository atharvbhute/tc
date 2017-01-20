@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">

                @foreach($events as $event)
                        {{--this is modal for a specific event --}}
                        <div class="modal fade" id="eventModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title"> Event </h3>
                                    </div>
                                    <div class="modal-body">
                                        <img class="img-responsive" src="{{$event->picture}}" alt="...">
                                        <div class="caption">
                                            <p><Strong>Name: </Strong>{{$event->name}}</p>
                                            <p><Strong>Organiser: </Strong>{{$event->organiser}}</p>
                                            <p><Strong>Date: </Strong>{{$event->date}}</p>
                                            <p><Strong>Address: </Strong>{{$event->address}}</p>
                                            <hr>
                                            <p><Strong>Fees: </Strong>{{$event->fees}}</p>
                                            <p class="col-sm-3"><strong>Prizes</strong></p>
                                            <p class="col-sm-3"><Strong>1st: </Strong>{{$event->fees}}</p>
                                            <p class="col-sm-3"><Strong>2nd: </Strong>{{$event->fees}}</p>
                                            @if(!empty($event->third))
                                            <p class="col-sm-3"><Strong>3rd: </Strong>{{$event->third}}</p>
                                            @endif
                                            <br>
                                            <hr>
                                            <p class="col-sm-12"><strong>Description: </strong>{!! $event->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-sm-6">
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-primary btn-lg">Go To Event</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    {{--this is the end of the modal for a specific event--}}
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
