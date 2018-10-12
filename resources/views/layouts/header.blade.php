<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <ul class="navbar-nav dashboard-auth">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </li>
        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
        <button class="btn btn-link text-default pull-right" type="button" data-toggle="layout" data-action="sidebar_open">
            <i class="fa fa-navicon"></i>
        </button>
        </li>
        {{--<li>--}}
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            {{--<button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">--}}
                {{--<i class="fa fa-tasks"></i>--}}
            {{--</button>--}}
        {{--</li>--}}
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        {{--<li class="hidden-md hidden-lg">--}}
            {{--<!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->--}}
            {{--<button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">--}}
                {{--<i class="fa fa-navicon"></i>--}}
            {{--</button>--}}
        {{--</li>--}}
        {{--<li class="hidden-xs hidden-sm">--}}
            {{--<!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->--}}
            {{--<button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">--}}
                {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--</button>--}}
        {{--</li>--}}
        {{--<li class="visible-xs">--}}
            {{--<!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->--}}
            {{--<button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">--}}
                {{--<i class="fa fa-search"></i>--}}
            {{--</button>--}}
        {{--</li>--}}
        {{--<li class="js-header-search header-search">--}}
            {{--<form class="form-horizontal" action="start_backend.html" method="post">--}}
                {{--<div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">--}}
                    {{--<input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">--}}
                    {{--<span class="input-group-addon"><i class="si si-magnifier"></i></span>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</li>--}}
    </ul>
    <!-- END Header Navigation Left -->
</header>
