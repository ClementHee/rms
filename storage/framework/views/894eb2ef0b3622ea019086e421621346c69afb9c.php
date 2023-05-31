<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
  
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <style type="text/css">
        .search-box .clear{
            clear:both;
            margin-top: 20px;
        }
    
        .search-box ul{
            list-style: none;
            padding: 0px;
            width: 250px;
            position: absolute;
            margin: 0;
            background: white;
        }
    
        .search-box ul li{
            background: lavender;
            padding: 4px;
            margin-bottom: 1px;
        }
    
        .search-box ul li:nth-child(even){
            background: cadetblue;
            color: white;
        }
    
        .search-box ul li:hover{
            cursor: pointer;
        }
    
        
        </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>

        // Enable pusher logging - don't include this in production
        
    
        var pusher = new Pusher('ea44c0267e7076ff3041', {
          cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('my-channel');
        channel.bind('new-request', function(data) {
            toastr.success('There is a new request');
        });
    
    
    $(document).ready(function() {
       
        //success toast
            
                
                toastr.options = {
                    autoClose: true,
                    progressBar: true,
                    sound: true
                };
                
                
                
            
            
          });
    
        </script>
   
    <?php echo \Livewire\Livewire::styles(); ?>

    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
          
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                           
                        <?php else: ?>
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('maintainence')); ?>">Maintainence</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('request_materials')); ?>">Request Materials</a>
                            </li>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Manage Students and Parents 
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="<?php echo e(route('student')); ?>">Students</a>

                                    <a class="nav-link" href="<?php echo e(route('parent')); ?>">Parents</a>
                                    <a class="nav-link" href="<?php echo e(route('student_parent')); ?>">All Details</a>
                                </div>
                            </li>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin')): ?>
                            <li><a class="nav-link" href="<?php echo e(route('users.index')); ?>">Manage Users</a></li>
                            <li><a class="nav-link" href="<?php echo e(route('roles.index')); ?>">Manage Role</a></li>
                            <?php endif; ?>
                            
                        </ul>
         
    
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                      
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
<?php echo \Livewire\Livewire::scripts(); ?>


</body>



   
</html>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/layouts/app.blade.php ENDPATH**/ ?>