<template>
    <ul class="navbar-nav remove-margin-t">
        <!-- Authentication Links -->
        <!--not logged in-->
        <template v-if="true">
            <li class="nav-item">
                <a class="nav-link" href="#">Route to login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Route to register</a>
            </li>
        </template>

        <!--logged in-->
        <span v-else>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    User's name here
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Route to logout / logout function
                    </a>

                    <!--Action is route to logout on server-->
                    <form id="logout-form" action="#" method="POST" style="display: none;">
                        <!--add csrf if necessary-->
                    </form>
                </div>
            </li>
        </span>
    </ul>
</template>