@if($events)
@foreach($events as $event)

    <a href="{{route('event',['id'=>$event->id])}}">
        <div class="col-sm-6 col-xs-12 col-md-4">
            <div class="thumbnail">
                <img src="{{$event->picture}}-/resize/335x188/" alt="...">
                <div class="caption">
                    <p><Strong>Name: </Strong>{{$event->name}}</p>
                    <p><Strong>Organiser: </Strong>{{$event->organiser}}</p>
                    <p><Strong>Date: </Strong>{{$event->date}}</p>
                    <p><Strong>Address: </Strong>{{$event->address}}</p>
                </div>
            </div>
        </div>
    </a>
@endforeach
@else
    @foreach($workshops as $workshop)

        <a href="{{route('workshop',['id'=>$workshop->id])}}">
            <div class="col-sm-6 col-xs-12 col-md-4">
                <div class="thumbnail">
                    <img src="{{$workshop->picture}}-/resize/335x188/" alt="...">
                    <div class="caption">
                        <p><Strong>Name: </Strong>{{$workshop->name}}</p>
                        <p><Strong>Organiser: </Strong>{{$workshop->organiser}}</p>
                        <p><Strong>Date: </Strong>{{$workshop->date}}</p>
                        <p><Strong>Address: </Strong>{{$workshop->address}}</p>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endif
