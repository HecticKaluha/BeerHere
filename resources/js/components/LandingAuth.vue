<template>
    <ul class="navbar-nav remove-margin-t">
        <!-- Authentication Links -->
        <!--not logged in-->
        <template v-if="true">
            <li class="nav-item">
                <router-link to="/login" class="nav-link">
                    Login
                </router-link>
            </li>
            <li class="nav-item">
                <router-link to="/register" class="nav-link">
                    Register
                </router-link>
            </li>
        </template>

        <!--logged in-->
        <template v-else>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    User's name here
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <!--Action is route to logout on server-->
                    <form id="logout-form" action="#" method="POST" style="display: none;">
                        <!--add csrf if necessary-->
                    </form>
                </div>
            </li>
        </template>
    </ul>
</template>