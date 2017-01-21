@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Entry Form</div>

                    @include('partials.flash')

                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST' , 'action' => 'CompetitorController@store' ]) !!}
                        <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('title','Name') }}
                            {{ Form::text('name',null,['class' => 'form-control']) }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('title','E-mail') }}
                            {{ Form::text('email',null,['class' => 'form-control']) }}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12{{ $errors->has('clgName') ? ' has-error' : '' }}">
                            {{ Form::label('title','College Name') }}
                            {{ Form::text('clgName',null,['class' => 'form-control']) }}
                            @if ($errors->has('clgName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('clgName') }}</strong>
                                    </span>
                            @endif
                        </div>
                        {{ Form::hidden('event_id', $id) }}

                        <div class="form-group col-md-6{{ $errors->has('contactNumber') ? ' has-error' : '' }}">
                            {{ Form::label('title','Contact Number') }}
                            <input class="form-control" type="text" name="contactNumber"
                                   onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            @if ($errors->has('contactNumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('contactNumber') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="alert alert-info col-md-12">
                            <p>please check all filled information ,once you submit it ,it will not be edit or delete</p>
                        </div>

                        <div class="col-md-12 pull-right">
                            {{ Form::submit('submit',['class'=>'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
