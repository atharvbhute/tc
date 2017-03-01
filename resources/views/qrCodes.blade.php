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
            <div class="col-md-12">
                <div class="row">
                    @include('partials.flash')
                    @if(count($mainEventQrs) == 0)
                        <h1>you haven't uploaded any event yet please upload by click on upload competitions , thank you</h1>
                    @endif
                    <div class="col-md-4 col-md-offset-2">
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


        </div>
    </div>
@endsection

