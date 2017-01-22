<!doctype html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
     <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Event</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <img class="img img-responsive" src="{{$picture}}-/resize/150x90/" alt="">
                    </div>
                    <div class="col-md-6">
                        <p><Strong>Name: </Strong>{{$eventName}}</p>
                        <p><Strong>Organiser: </Strong>{{$organiser}}</p>
                        <p><Strong>Date: </Strong>{{$date}}</p>
                        <p><Strong>Address: </Strong>{{$address}}</p>
                        <p><Strong>Fees: </Strong>{{$fees}}</p>
                        @if(!empty($first)||!empty($second)||!empty($third))
                            <p><strong>Prizes: </strong></p>
                        @endif
                        @if(!empty($first))
                            <p class="col-sm-4"><strong>2st: </strong>{{$first}}</p>
                        @endif
                        @if(!empty($second))
                            <p class="col-sm-4"><strong>2st: </strong>{{$second}}</p>
                        @endif
                        @if(!empty($third))
                            <p class="col-sm-4"><strong>3st: </strong>{{$third}}</p>
                        @endif

                        <p><Strong>contact: </Strong>{{$contactNumber}}</p>
                    </div>
                    <br>
                    <hr>

                        <p><strong>Name: </strong>{{$name}}</p>
                        <p><strong>Email: </strong>{{$email}}</p>
                        <p><strong>College Name: </strong>{{$clgName}}</p>
                        <p><strong>Contact: </strong>{{$contactNumber}}</p>


                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>