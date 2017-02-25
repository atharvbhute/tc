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
                            {!! Form::open(['method'=>'post','action'=>'CategoriesController@store']) !!}
                            <div class="form-group">
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
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
                        <br>
                        <br>
                        <br>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>name</th>
                                <th>image</th>
                                <th>delete</th>
                                <th>update</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach(App\Category::all() as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td><img src="{{$category->image}}-/resize/150x85/" alt=""></td>
                                    <td><a href="{{route('delete_category',['id'=>$category->id])}}" class="btn btn-danger">delete</a></td>
                                    <td><a href="{{route('update_category',['id'=>$category->id])}}" class="btn btn-primary">update</a></td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection
