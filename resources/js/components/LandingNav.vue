<template>
    <nav id="sidebar">
        <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
            <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="side-header side-content">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-link text-gray pull-right visible-xs visible-sm" type="button" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times"></i>
                    </button>
                    <router-link to="/" class="h5 text-white">
                        <img class="fa" src="assets/img/favicons/favicon-16x16.png"> <span class="h6 font-w600 sidebar-mini-hide"> Be Here</span>
                    </router-link>
                </div>
                <!-- END Side Header -->

                <!-- Side Content -->
                <div class="side-content side-content-full">
                    <ul class="nav-main">
                        <router-link tag="li" to="/home">
                            <a class="active" ><i class="si si-home"></i><span class="sidebar-mini-hide">Home</span></a>
                        </router-link>
                    </ul>
                </div>
                <!-- END Side Content -->
            </div>
            <!-- Sidebar Content -->
        </div>
        <!-- END Sidebar Scroll Container -->
    </nav>
</template>