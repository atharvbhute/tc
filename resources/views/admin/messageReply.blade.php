@extends('admin.app')
@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               reply to message
                                <p class="pull-right"><strong>To : {{$message->name}} </strong>({{$message->email}})</p>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['method'=>'post','action'=>'AdminController@sendReply']) !!}
                                <div class="form-group">
                                    {!! Form::textarea('replyMessage',null,['class'=>'form-control']) !!}
                                </div>
                                {!! Form::hidden('emailAddress',$message->email) !!}

                            </div>

                            <div class="panel-footer">
                                {!! Form::submit('send',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection
