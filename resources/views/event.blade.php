@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Event</div>
                    <div class="panel-body">
                        <div class="col-md-12">


                        <div class="col-md-6">
                            <img class="img img-responsive" src="{{ $event->picture }}-/resize/382x215/" alt="">
                        </div>
                        <div class="col-md-6">
                            <p><Strong>Name: </Strong>{{$event->name}}</p>
                            <p><Strong>Organiser: </Strong>{{$event->organiser}}</p>
                            <p><Strong>Date: </Strong>{{$event->date}}</p>
                            <p><Strong>Address: </Strong>{{$event->address}}</p>
                            <p><Strong>Fees: </Strong>{{$event->fees}}</p>
                            @if(!empty($event->first)||!empty($event->second)||!empty($event->third))
                            <p><strong>Prizes: </strong></p>
                            @endif
                            @if(!empty($event->first))
                                <p class="col-sm-4"><strong>1st: </strong>{{$event->first}}</p>
                            @endif
                            @if(!empty($event->second))
                                <p class="col-sm-4"><strong>2st: </strong>{{$event->second}}</p>
                            @endif
                            @if(!empty($event->third))
                            <p class="col-sm-4"><strong>3st: </strong>{{$event->third}}</p>
                            @endif
                        </div>
                        </div>

                            <div class="col-sm-12 col-md-12">
                            <hr>
                            <p ><strong>Description (please read description very carefully): </strong>{!! $event->description !!}</p>

                            </div>
                        <br>
                        <hr>
                        <a href="{{route('entryForm',['id'=>$event->id])}}"><button class="btn btn-primary pull-right">Go To An Event</button></a>

                </div>
            </div>
        </div>
    </div>
@endsection