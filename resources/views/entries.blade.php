@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="panel panel-default" id="printArea">
                        <div class="panel-heading">
                            {{$event->name}}({{$event->organiser}})
                            <strong class="pull-right">thecompete</strong>
                        </div>
                        <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Collage Name</th>
                                <th>Contact Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entries as $entry)
                            <tr>
                                <td>{{ $entry->name }}</td>
                                <td>{{ $entry->email }}</td>
                                <td>{{ $entry->clgName }}</td>
                                <td>{{ $entry->contactNumber }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                            </div>
                        <div class="panel-footer">
                            <button onclick="window.print()" class="btn btn-primary" id="printButton">Take a print</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
