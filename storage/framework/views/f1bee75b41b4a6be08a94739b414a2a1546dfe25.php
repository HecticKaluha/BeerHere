<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <ul class="navbar-nav dashboard-auth">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown text-right">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?>

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-right-force" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <li>
        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
        <button class="btn btn-link text-default pull-right hidden-lg hidden-md" type="button" data-toggle="layout" data-action="sidebar_open">
            <i class="fa fa-navicon"></i>
        </button>
        </li>
        
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            
                
            
        
    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        
            
            
                
            
        
        
            
            
                
            
        
        
            
            
                
            
        
        
            
                
                    
                    
                
            
        
    </ul>
    <!-- END Header Navigation Left -->
</header>
