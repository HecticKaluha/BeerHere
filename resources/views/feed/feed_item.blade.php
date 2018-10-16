<li>
    <div class="list-timeline-time">{{\Carbon\Carbon::parse($item->pivot->liked_on)->format('D d-m-Y')}}</div>
    <i class="{{$type == 'like' ? 'si si-like' : 'fa fa-beer'}} list-timeline-icon bg-success"></i>
    <div class="list-timeline-content">
        <ul class="nav-users push">
            <li>
                <a href="/profile/{{$item->id}}">
                    <img class="img-avatar" src="{{asset('image/profile_temp.jpg')}}" alt="">
                    You {{$type}}d {{$type == 'matche' ? 'with' : ''}} {{$item->name}}
                    <div class="font-w400 text-muted">
                        <small>{{$item->place}}</small>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</li>