@extends('layouts.app')

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#shareBtn').click(function(e){
                e.preventDefault();
                FB.ui({
                    method: 'share',
                    display: 'popup',
                    href: 'http://thecompete.com/{{$workshop->id}}/workshop',
                }, function(response){});
            });
        });
    </script>
@endsection

@section('title')
    thecompete | {{$workshop->name}}
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
                                <img class="img img-responsive" src="{{ $workshop->picture }}-/resize/382x215/" alt="">
                            </div>
                            <div class="col-md-6">
                                <p><Strong>Name: </Strong>{{$workshop->name}}</p>
                                <p><Strong>Organiser: </Strong>{{$workshop->organiser}}</p>
                                <p><Strong>Date: </Strong>{{$workshop->date}}</p>
                                <p><Strong>Address: </Strong>{{$workshop->address}}</p>
                                <p><Strong>Fees: </Strong>{{$workshop->fees}}</p>
                                <p class="col-sm-12"><strong>Contact: </strong>{{$workshop->contactNumber}}</p>

                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <hr>
                            <p ><strong class="bg-info">Description (please read description very carefully): </strong>{!! $workshop->description !!}</p>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <hr>
                            <p class="bg-info"><strong>Note: </strong>you have to pay event fees at the time when you are going to an workshop</p>
                        </div>


                        <hr>
                        <div id="shareBtn" class="btn btn-success clearfix pull-left">Share</div>
                        <a href="{{route('entryForm',['id'=>$workshop->id])}}"><button class="btn btn-primary pull-right">Go To An Event</button></a>

                    </div>
                </div>
            </div>
        </div>
@endsection
