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
                <div class="panel panel-default">
                    <div class="panel-heading">Upload Event</div>

                    @include('partials.flash')

                    <div class="panel-body">

                    {!! Form::open(['method' => 'POST' , 'action' => 'EventController@store' ]) !!}
                        <div class="form-group col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('title','Event Name') }}
                            {{ Form::text('name',old('name'),['placeholder'=>'Ex .Box cricket, cs go , singing contest','class' => 'form-control']) }}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6{{ $errors->has('organiser') ? ' has-error' : '' }}">
                            {{ Form::label('title','Organiser') }}
                            {{ Form::text('organiser',old('organiser'),['placeholder'=>'Ex .mindsparks ,etc','class' => 'form-control']) }}
                            @if ($errors->has('organiser'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('organiser') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12{{ $errors->has('address') ? ' has-error' : '' }}">
                            {{ Form::label('title','Address') }}
                            {{ Form::text('address',old('address'),['class' => 'form-control']) }}
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group col-md-6{{ $errors->has('date') ? ' has-error' : '' }}">
                            {{ Form::label('title','Date') }}
                            {{ Form::date('date',old('date'),['class' => 'form-control']) }}
                            @if ($errors->has('date'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group col-md-6{{ $errors->has('fees') ? ' has-error' : '' }}">
                            {{ Form::label('title','Fees') }}
                            <input class="form-control" type="text" name="fees" value="{{old('fees')}}"
                                   onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            @if ($errors->has('fees'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('fees') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12 }}">
                            {{ Form::label('title','Prize') }}
                        </div>

                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" name="first" placeholder="1st" value="{{old('first')}}"
                                   onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                        </div>

                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" name="second" placeholder="2nd" value="{{old('second')}}"
                                   onkeyup="this.value=this.value.replace(/[^\d]/,'')">

                        </div>

                        <div class="form-group col-md-4 }}">
                            <input class="form-control" type="text" name="third" placeholder="3rd" value="{{old('third')}}"
                                   onkeyup="this.value=this.value.replace(/[^\d]/,'')">
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

                        <div class="form-group col-md-6{{ $errors->has('contactNumber') ? ' has-error' : '' }}">
                            {{ Form::label('title','Contact number') }}
                            <input class="form-control" type="text" name="contactNumber" value="{{old('contactNumber')}}"
                                   onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                            @if ($errors->has('contactNumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('contactNumber') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
                            <div class="bg-info">
                                {{ Form::label('title','Description (please fill description with details , so that your visitors can understand it better)') }}

                            </div>
                            {{ Form::textarea('description',old('description'),['placeholder'=>'please fill description with details','class' => 'form-control']) }}
                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="alert alert-info col-md-12">
                            <p>please check all filled information ,once you upload it ,it will not be edit or delete</p>
                        </div>

                        <div class="col-md-12 pull-left">
                            {{ Form::submit('submit',['class'=>'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}

                </div>
             </div>
            </div>
        </div>
    </div>
@endsection
