@if(session('matchesWhenAway'))
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h3 class="font-w300 push-15">Good news!</h3>
        <p>You <a class="alert-link" href="/personal/matches/">matched with {{session('matchesWhenAway')}}</a> new {{str_plural('person', session('matchesWhenAway'))}} when you were away!</p>
    </div>
@endif