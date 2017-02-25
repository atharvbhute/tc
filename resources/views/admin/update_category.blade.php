@extends('admin.app')
@section('script')
    <script>
        UPLOADCARE_PUBLIC_KEY = 'f963dfe4bf25e76a2faf';
    </script>
    <script src="https://ucarecdn.com/libs/widget/2.10.2/uploadcare.full.min.js" charset="utf-8"></script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            @include('partials.flash')

            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['method'=>'put','action'=>['CategoriesController@updateStore',$category->id]]) !!}
                        <div class="form-group">
                            {!! Form::text('name',$category->name,['class'=>'form-control']) !!}
                        </div>
                        <input type="hidden" value="{{$category->image}} "name="oldImage">
                        <div class="form-group">
                            {{ Form::label('title','image') }}
                            <input type="hidden" name="image"
                                   role="uploadcare-uploader"
                                   data-images-only
                                   data-crop="16:9"
                                   UPLOADCARE_CLEARABLE = true;
                            />

                        </div>
                        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
