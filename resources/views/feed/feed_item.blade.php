<li>
    <div class="list-timeline-time">{{\Carbon\Carbon::parse($item->pivot->liked_on)->diffForHumans()}}</div>
    <i class="{{$type == 'like' ? 'si si-like' : 'fa fa-beer'}} list-timeline-icon {{$type == 'like' ? 'bg-info' : 'bg-success'}}"></i>
    <div class="list-timeline-content">
        <ul class="nav-users push">
            <li>
                <a href="/profile/{{$item->id}}">
                    <img class="img-avatar" src="@if($item->avatar_url){{asset($item->avatar_url)}}@else {{asset('image/no-profile.gif')}} @endif" alt="">
                    You {{$type}}d {{$type == 'matche' ? 'with' : ''}} {{$item->name}}
                    <div class="font-w400 text-muted">
                        <small>{{$item->place}}</small>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</li>