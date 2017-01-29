@extends('admin.app')
@section('content')

    <div class="container">
        <div class="row">
            @include('partials.flash')
            @foreach($contactMessages as $contactMessage)
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{$contactMessage->name}}
                            <strong class="pull-right">{{$contactMessage->email}}</strong>
                        </div>
                        <div class="panel-body">
                            {{$contactMessage->message}}
                        </div>

                        <div class="panel-footer">

                            <a href="{{route('delete_message',['id'=>$contactMessage->id])}}">
                                <button class="btn btn-danger">delete</button>
                            </a>
                            <a href="{{route('reply_message',['id'=>$contactMessage->id])}}">
                                <button class="btn btn-primary">reply</button>
                            </a>
                            <div class="pull-right">
                                @if($contactMessage->replied)
                                    <p class="bg-success">replied</p>
                                @else
                                    <p class="bg-danger">not replied yet</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
    </div>
@endsection
