@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">

                    {{--@foreach($pevents as $pevent)--}}
                        {{--<a href="{{route('event',['id'=>$pevent->id])}}">--}}
                            {{--<div class="col-sm-6 col-md-4">--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img src="{{$pevent->picture}}" alt="...">--}}
                                    {{--<div class="caption">--}}
                                        {{--<p><Strong>Name: </Strong>{{$pevent->name}}</p>--}}
                                        {{--<p><Strong>Organiser: </Strong>{{$pevent->organiser}}</p>--}}
                                        {{--<p><Strong>Date: </Strong>{{$pevent->date}}</p>--}}
                                        {{--<p><Strong>Address: </Strong>{{$pevent->address}}</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--@endforeach--}}
                </div>
            </div>
        </div>
    </div>
@endsection
