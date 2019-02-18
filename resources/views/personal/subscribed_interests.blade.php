<h2 class="content-heading">Subscribed Interests</h2>
<div class="row">
    @if(!$interests->isempty())
        @foreach($interests as $interest)
            @include('interests.interest')
        @endforeach
    @else
        <div class="col-lg-12">
            @include('empty.empty_interests')
        </div>
    @endif
</div>