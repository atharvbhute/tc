@extends('layouts.app')

@section('title')
    contact | thecompete
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="panel panel-default">
                    @include('partials.flash')
                        <div class="panel-body">
                            {!! Form::open(['method' => 'POST' , 'action' => 'ContactController@store' ]) !!}
                            <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{ Form::label('title','Name') }}
                                {{ Form::text('name',old('name'),['class' => 'form-control']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{ Form::label('title','E-mail') }}
                                {{ Form::text('email',old('email'),['class' => 'form-control']) }}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div><div class="form-group col-md-12{{ $errors->has('message') ? ' has-error' : '' }}">
                                {{ Form::label('title','Message') }}
                                {{ Form::textarea('message',old('message'),['class' => 'form-control']) }}
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
                            </div>
                            <hr>
                                <div class="pull-right">

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
