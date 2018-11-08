<div class="block block-themed">
    <div class="block-header {{$type == 'like' ? 'bg-info' : 'bg-success'}}">
        <ul class="block-options">
            <li>
                <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i
                            class="si si-size-fullscreen"></i></button>
            </li>
            <li>
                <button type="button" data-toggle="block-option" data-action="content_toggle"><i
                            class="si si-arrow-up"></i></button>
            </li>
        </ul>
        <h3 class="block-title"><a class="text-white" href="/personal/{{$type}}s">{{$type}}s</a></h3>
    </div>
    <div class="block-content timeline">
        @if(!$feeditems->isEmpty())
            <ul class="list list-timeline pull-t">
                @foreach($feeditems as $item)
                    @include('feed.feed_item')
                @endforeach
            </ul>
        @else
            @include('empty.empty')
        @endif
    </div>
</div>

@push('scripts')
    {{--<script>--}}
        {{--jQuery(function () {--}}
            {{--// Init page helpers (SlimScroll plugin)--}}
            {{--App.initHelpers('slimscroll');--}}
        {{--});--}}
    {{--</script>--}}
@endpush

