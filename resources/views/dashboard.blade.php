@extends('layouts.app')
@section('title')
    dashboard | thecompete
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#shareBtn').click(function indiSahre(eventId,e){
                e.preventDefault();
                FB.ui({
                    method: 'share',
                    display: 'popup',
                    href: 'http://thecompete.com/11/event',
                }, function(response){});
            });
        });
    </script>
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @include('partials.flash')
                    @if(count($events) == 0)
                        <h1>you haven't uploaded any competition yet please upload by click on upload competitions , thank you</h1>
                    @endif
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
                                    {{--<a href="#" id="shareBtn" data-eventId="{{$event->id}}" class="btn btn-success clearfix pull-right">Share</a>--}}

                                    <a href="{{route('entries',['id'=>$event->id])}}"><button class="btn btn-primary pull-right">entries</button></a>
                                    <a href="{{route('deleteEvent',['id'=>$event->id])}}"><button class="btn btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                @foreach($mainEventQrs as $mainEventQr)
                    <p class="bg-info"><strong>print this qr codes - "for online registration refer this".</strong></p>
                    <div class="thumbnail" id="printDiv">
                        <p class="bg-primary" style="text-align: center">thecompete.com</p>
                        <p class="bg-info" style="text-align: center"><strong>{{$mainEventQr->name}}</strong></p>
                        <div style="align-content: center">{!! QrCode::size(200)->generate(route('main_event',['id'=>$mainEventQr->id])) !!}</div>
                        <p>scan me to register for an awesome competitions</p>
                        <hr>
                        <p>Note:if you are having any problem with above Qr code then please refer below url :</p>
                        <p>{{route('main_event',['id'=>$mainEventQr->id])}}</p>
                        <hr>
                        <p style="text-align: center">thecompete © 2017</p>
                    </div>

                    <button onclick="printContent('printDiv')" class="btn btn-block btn-primary">print</button>
                    <hr>

                @endforeach
            </div>
            <script>
                function printContent(el){
                    var restorepage = document.body.innerHTML;
                    var printcontent = document.getElementById(el).innerHTML;
                    document.body.innerHTML = printcontent;
                    window.print();
                    document.body.innerHTML = restorepage;
                }
            </script>

        </div>
    </div>
@endsection
