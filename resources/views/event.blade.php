@extends('layouts.app')

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#shareBtn').click(function(e){
                e.preventDefault();
                FB.ui({
                    method: 'share',
                    display: 'popup',
                    href: 'http://thecompete.com/{{$event->picture}}/event',
                }, function(response){});
            });
        });
    </script>
@endsection

@section('title')
    thecompete | {{$event->name}}
@endsection

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
                            <p class="col-sm-12"><strong>Contact: </strong>{{$event->contactNumber}}</p>

                        </div>
                        </div>

                            <div class="col-sm-12 col-md-12">
                            <hr>
                            <p ><strong class="bg-info">Description (please read description very carefully): </strong>{!! $event->description !!}</p>

                            </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <hr>
                            <p class="bg-info"><strong>Note: </strong>you have to pay event fees at the time when you are going to an event</p>
                        </div>


                        <hr>
                        <div id="shareBtn" class="btn btn-success clearfix pull-left">Share</div>
                        <a href="{{route('entryForm',['id'=>$event->id])}}"><button class="btn btn-primary pull-right">Go To An Event</button></a>

                </div>
            </div>
        </div>
    </div>
@endsection
