<template>
    <header id="header-navbar" class="content-mini content-mini-full hidden-md hidden-lg">
        <div class="content-boxed">
            <!-- Header Navigation Right -->
            <ul class="nav-header pull-right">
                <li>
                    <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                    <div class="btn-group">
                        <!--auth here-->
                        <landing_auth></landing_auth>
                        <!--end auth-->
                    </div>
                </li>
                <li>
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-link text-white pull-right" type="button" data-toggle="layout" data-action="sidebar_open">
                        <i class="fa fa-navicon"></i>
                    </button>
                </li>
            </ul>
            <!-- END Header Navigation Right -->

            <!-- Header Navigation Left -->
            <ul class="nav-header pull-left">
                <li class="header-content">
                    <a class="h5" href="/home">
                        <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 text-white">Be Here</span>
                    </a>
                </li>
            </ul>
            <!-- END Header Navigation Left -->
        </div>
    </header>
</template>