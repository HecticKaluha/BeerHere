<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout"
                        data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>
                <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                <div class="btn-group pull-right">
                    <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                        <i class="si si-drop"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                        <li>
                            <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                <i class="fa fa-circle text-default pull-right"></i> <span
                                        class="font-w600">Default</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-amethyst pull-right"></i> <span
                                        class="font-w600">Amethyst</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-modern pull-right"></i> <span
                                        class="font-w600">Modern</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1"
                               href="javascript:void(0)">
                                <i class="fa fa-circle text-smooth pull-right"></i> <span
                                        class="font-w600">Smooth</span>
                            </a>
                        </li>
                    </ul>
                </div>
                {{--uncomment these lines if you want the logo to be the sidebar toggle--}}
                {{--<ul class="nav-header pull-left">--}}
                {{--<li class="h5 text-white" data-toggle="layout" data-action="sidebar_mini_toggle">--}}
                {{--<img class="fa" src="/assets/img/favicons/favicon-16x16.png"> <span--}}
                {{--class="h6 font-w600 sidebar-mini-hide"> BeerHere</span>--}}
                {{--</li>--}}
                {{--</ul>--}}
                <a class="h5 text-white" href="/home">
                    <img class="fa" src="/assets/img/favicons/favicon-16x16.png"> <span
                            class="h6 font-w600 sidebar-mini-hide"> Be Here</span>
                </a>

            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content side-content-mini">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="/suggestions"><i class="si si-chemistry"></i><span
                                    class="sidebar-mini-hide">Suggestions</span></a>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Pages</span></li>
                    <li>
                        <a class="nav" data-toggle="" href="/home"><i class="si si-feed"></i><span
                                    class="sidebar-mini-hide">Personal feed</span></a>
                    </li>
                    <li>
                        <a class="nav" data-toggle="" href="/profile"><i class="si si-user"></i><span
                                    class="sidebar-mini-hide">Profile</span></a>
                    </li>
                    <li>
                        <a class="nav" data-toggle="" href="/personal/interests"><i class="si si-heart"></i><span
                                    class="sidebar-mini-hide">Interests</span></a>
                    </li>
                    <li>
                        <a class="nav" data-toggle="" href="/personal/likes"><i class="si si-like"></i><span
                                    class="sidebar-mini-hide">Likes</span></a>
                    </li>
                    <li>
                        <a class="nav" data-toggle="" href="/personal/matches"><i class="fa fa-beer"></i><span
                                    class="sidebar-mini-hide">Matches</span></a>
                    </li>
                    <li>
                        <a class="nav" data-toggle="" href="/settings/"><i class="si si-settings"></i><span
                                    class="sidebar-mini-hide">Settings</span></a>
                    </li>

                    @if(in_array(Auth::user()->role_id, [1,2]))
                        <li class="nav-main-heading"><span class="sidebar-mini-hide">Admin routes</span></li>
                        <li>
                            <a class="nav" data-toggle="" href="/interests"><i class="si si-wrench"></i><span
                                        class="sidebar-mini-hide">Manage interests</span></a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
