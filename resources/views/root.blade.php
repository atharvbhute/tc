@extends('layouts.app')
@section('title')
    thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" src="https://ucarecdn.com/3e99dfa9-d074-49d5-a7be-89e668947797/-/crop/2307x1296/131,0/-/preview/" alt="">
                        <div class="overlay">
                            <h2>HOT</h2>
                            <a class="info" href="{{url("/hot_event")}}">See Hot Events</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" src="https://ucarecdn.com/b093ea07-9695-4778-881b-9c3d91d1214d/EVENTS.png" alt="">
                        <div class="overlay">
                            <h2>Main Events</h2>
                            <a class="info" href="{{url("/main_events")}}">See Main Events</a>
                        </div>
                    </div>
                </div>

               <h1 style="text-align:center;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif"> Categories </h1>
                <hr>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect">
                        <img class="img-responsive" src="https://ucarecdn.com/dd91a833-953f-4f64-a968-e0583aadcaec/-/crop/732x412/47,0/-/preview/" alt="">
                        <div class="overlay">
                            <h2>All</h2>
                            <a class="info" href="{{url("/all")}}">click hear to see</a>
                        </div>
                    </div>
                </div>
                @foreach(\App\Category::all() as $category)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="hovereffect">
                            <img class="img-responsive" src="{{$category->image}}" alt="">
                            <div class="overlay">
                                <h2>{{$category->name}}</h2>
                                <a class="info" href="{{url("/category/$category->id")}}">click hear to see</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <style type="text/css">
                    .hovereffect {
                        width: 100%;
                        height: 100%;
                        float: left;
                        overflow: hidden;
                        position: relative;
                        text-align: center;
                        cursor: default;
                    }

                    .hovereffect .overlay {
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        overflow: hidden;
                        top: 0;
                        left: 0;
                        background-color: rgba(75,75,75,0.7);
                        -webkit-transition: all 0.4s ease-in-out;
                        transition: all 0.4s ease-in-out;
                    }

                    .hovereffect:hover .overlay {
                        background-color: rgba(48, 152, 157, 0.4);
                    }

                    .hovereffect img {
                        display: block;
                        position: relative;
                    }

                    .hovereffect h2 {
                        text-transform: uppercase;
                        color: #fff;
                        text-align: center;
                        position: relative;
                        font-size: 17px;
                        padding: 10px;
                        background: rgba(0, 0, 0, 0.6);
                        -webkit-transform: translateY(45px);
                        -ms-transform: translateY(45px);
                        transform: translateY(45px);
                        -webkit-transition: all 0.4s ease-in-out;
                        transition: all 0.4s ease-in-out;
                    }

                    .hovereffect:hover h2 {
                        -webkit-transform: translateY(5px);
                        -ms-transform: translateY(5px);
                        transform: translateY(5px);
                    }

                    .hovereffect a.info {
                        display: inline-block;
                        text-decoration: none;
                        padding: 7px 14px;
                        text-transform: uppercase;
                        color: #fff;
                        border: 1px solid #fff;
                        background-color: transparent;
                        opacity: 0;
                        filter: alpha(opacity=0);
                        -webkit-transform: scale(0);
                        -ms-transform: scale(0);
                        transform: scale(0);
                        -webkit-transition: all 0.4s ease-in-out;
                        transition: all 0.4s ease-in-out;
                        font-weight: normal;
                        margin: -52px 0 0 0;
                        padding: 62px 100px;
                    }

                    .hovereffect:hover a.info {
                        opacity: 1;
                        filter: alpha(opacity=100);
                        -webkit-transform: scale(1);
                        -ms-transform: scale(1);
                        transform: scale(1);
                    }

                    .hovereffect a.info:hover {
                        box-shadow: 0 0 5px #fff;
                    }
                </style>

            </div>
        </div>
    </div>
@endsection
