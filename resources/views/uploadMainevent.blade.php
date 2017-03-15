@extends('layouts.app')

@section('title')
    upload event | thecompete
@endsection
@section('script')
    <script src="https://ucarecdn.com/libs/widget/2.10.2/uploadcare.full.min.js" charset="utf-8"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        UPLOADCARE_PUBLIC_KEY = 'f963dfe4bf25e76a2faf';
    </script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if($existedEvents->count()==!0)
                    <div class="bg bg-danger"><p>Add in Existed One</p></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>organiser</th>
                            <th>ADD</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($existedEvents as $existedEvent)
                            <tr>
                                <td>{{$existedEvent->name}}</td>
                                <td>{{$existedEvent->organiser}}</td>
                                <td><a href="{{route('mainEventId',['mainEventId'=>$existedEvent->id])}}" class="btn btn-primary">add</a></td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    <hr>
                <p class="bg bg-info">or create new one</p>

                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Main Event</div>


                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST' , 'action' => 'EventController@mainEventstore' ]) !!}
                        <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('title','Event Name') }}
                            {{ Form::text('name',old('name'),['placeholder'=>'Mindsparks, mpulse , techligent','class' => 'form-control']) }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6{{ $errors->has('organiser') ? ' has-error' : '' }}">
                            {{ Form::label('title','Organiser') }}
                            {{ Form::text('organiser',old('organiser'),['placeholder'=>'Ex .COEP ,PCCOE','class' => 'form-control']) }}
                            @if ($errors->has('organiser'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('organiser') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-6{{ $errors->has('picture') ? ' has-error' : '' }}">
                            {{ Form::label('title','Picture') }}
                            <input type="hidden" name="picture"
                                   role="uploadcare-uploader"
                                   data-images-only
                                   data-crop="16:9"
                                   UPLOADCARE_CLEARABLE = true;
                            />
                            @if ($errors->has('picture'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="alert alert-info col-md-12">
                            <p>please check all filled information ,once you upload it ,it will not be edited or deleted,
                                you have to take event fees on the spot, we will integrate a suitable payment system for you ,very soon. </p>
                        </div>

                        <div class="col-md-12 pull-left">
                            {{ Form::submit('proceed to upload Competitions',['class'=>'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
