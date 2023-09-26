<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
  
    <script src="https://cdn.tailwindcss.com"></script> 

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
    <script src="https://cdn.tailwindcss.com"></script>
    <div id="app">
        <nav class="relative flex flex-wrap items-center content-between py-3 px-4  text-black bg-white shadow-sm">
            <div class="container mx-auto sm:px-4">
                <a class="inline-block pt-1 pb-1 mr-4 text-lg whitespace-no-wrap" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
          
                <button class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="px-5 py-1 border border-gray-600 rounded"></span>
                </button>

                <div class="hidden flex-grow items-center" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="flex flex-wrap list-reset pl-0 mb-0 ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="">
                                    <a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                           
                        <?php else: ?>
                        <ul class="flex flex-wrap list-reset pl-0 mb-0 me-auto">
                            <li class="">
                                <a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('maintainence')); ?>">Maintainences</a>
                            </li>
                            <li class="">
                                <a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('request_materials')); ?>">Request Materials</a>
                            </li>
                            </li>
                            <li class=" relative">
                                <a id="navbarDropdown" class="inline-block py-2 px-4 no-underline  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Manage Students and Parents 
                                </a>

                                <div class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('student')); ?>">Students</a>

                                    <a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('parent')); ?>">Parents</a>
                                    <a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('student_parent')); ?>">All Details</a>
                                </div>
                            </li>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin')): ?>
                            <li><a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('users.index')); ?>">Manage Users</a></li>
                            <li><a class="inline-block py-2 px-4 no-underline" href="<?php echo e(route('roles.index')); ?>">Manage Role</a></li>
                            <?php endif; ?>
                            
                        </ul>
         
    
                            <li class=" relative">
                                <a id="navbarDropdown" class="inline-block py-2 px-4 no-underline  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                    
                                </a>

                                <div class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
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



   
</html><?php /**PATH C:\xampp\htdocs\rms\resources\views/layouts/apptailwind.blade.php ENDPATH**/ ?>