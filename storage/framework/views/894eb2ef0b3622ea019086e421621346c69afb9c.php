<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 

    <!-- Custom fonts for this template-->
  
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style type="text/css">
        .search-box .clear{
            clear:both;
            margin-top: 20px;
        }
    
        .search-box ul{
            list-style: none;
            padding: 0px;
            width: 250px;
 
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
            cursor: pointer;}
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    
    <script>
        var pusher = new Pusher('ea44c0267e7076ff3041', {
          cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('my-channel');
        channel.bind('new-request', function(data) {
            toastr.success('There is a new request');
        });
    
    $(document).ready(function() {      
                toastr.options = {
                    autoClose: true,
                    progressBar: true,
                    sound: true
                };         
          });
    </script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/paper-dashboard.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">

    <?php echo \Livewire\Livewire::styles(); ?>

    
</head>

<body id="page-top">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
          <div class="logo">
            
            <a href="<?php echo e(url('/')); ?>" class="simple-text logo-normal">
              Rhema Management System
              <!-- <div class="logo-image-big">
                <img src="../assets/img/logo-big.png">
              </div> -->
            </a>
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li>
                <a href="<?php echo e(url('/')); ?>">
                  <p>Main Dashboard</p>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Maintainence</a>
                <div class="dropdown-menu ms-5">
                  <a  class="dropdown-item text-dark" href="<?php echo e(route('maintainence')); ?>">
                    <p>Maintainence</p>
                  </a>

                  <a  class="dropdown-item text-dark" href="<?php echo e(route('scheduled_maintainence')); ?>">
                    <p>Scheduled Maintainence</p>
                  </a>
                  
                  <a  class="dropdown-item text-dark" href="<?php echo e(route('to_do_list')); ?>">
                    <p>To Do List</p>
                  </a>
                </div>
              </li>
             
              <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'Admin|SuperAdmin|EMT')): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Student and Parents</a>
                <div class="dropdown-menu ms-5">
                  <a class="dropdown-item text-dark" href="<?php echo e(route('student')); ?>" >Students</a>

                  <a class="dropdown-item text-dark" href="<?php echo e(route('parent')); ?>">Parents</a>
                  
                  <a class="dropdown-item text-dark" href="<?php echo e(route('student_parent')); ?>">All Details</a>
                </div>
              </li>
              <li><a class="nav-link" href="<?php echo e(route('siblingslist')); ?>">Siblings List</a></li>
              <?php endif; ?>
              <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin')): ?>
                
                <li><a class="nav-link" href="<?php echo e(route('users.index')); ?>">Manage Users</a></li>
                <li><a class="nav-link" href="<?php echo e(route('roles.index')); ?>">Manage Role</a></li>
              <?php endif; ?>

              

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Staffs</a>
                <div class="dropdown-menu ms-5">
                  <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'EMT')): ?>
                  <a class="dropdown-item text-dark" href="<?php echo e(route('staff')); ?>">Staffs</a>
                  <?php endif; ?>
                  <a class="dropdown-item text-dark" href="<?php echo e(route('leave')); ?>">Staff Leaves</a>
                </div>
              </li>
        
              
            </ul>
          </div>
        </div>
        <div class="main-panel" style="height: 100vh;">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <div class="navbar-toggle">
                  <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </button>
                </div>
                
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navigation">
                
                <ul class="navbar-nav">
                  <li class="nav-item btn-rotate dropdown">
                    <button class="btn btn-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php echo e(Auth::user()->name); ?>

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <ul class="list-unstyled">
                        <li>
                          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <?php echo e(__('Logout')); ?>

                          </a>
                        </li>
                      </ul>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                      </form>
                    
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <main class="py-4">
                  <?php echo $__env->yieldContent('content'); ?>
              </main>
              </div>
            </div>
          </div>
         <!--<footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
            <div class="container-fluid">
              <div class="row">
                <nav class="footer-nav">
                  <ul>
                    <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                    <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                    <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
                  </ul>
                </nav>
                <div class="credits ml-auto">
                  <span class="copyright">
                    © 2020, made with <i class="fa fa-heart heart"></i> by Creative Tim
                  </span>
                </div>
              </div>
            </div>
          </footer>-->
        </div>
      </div>


<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

<script src="<?php echo e(asset("js/core/popper.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/core//bootstrap.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/plugins/perfect-scrollbar.min.js")); ?>"></script>

<!-- Chart JS -->
<script src="<?php echo e(asset('js/plugins/chartjs.min.js')); ?>"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo e(asset('js/plugins/bootstrap-notify.js')); ?>"></script>

<!-- Control Center for Paper Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo e(asset('js/paper-dashboard.min.js?v=2.0.0')); ?>" type="text/javascript"></script>

<?php echo \Livewire\Livewire::scripts(); ?>

<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  window.addEventListener('swal:modal',event => {
    swal({
      title: event.detail.title,
      text: event.detail.text,
      icon: event.detail.icon,
      buttons:false,
      timer:3000,
    });
  });

  window.addEventListener('swal:confirm',event => {
    swal({
      title: event.detail.title,
      text: event.detail.text,
      icon: event.detail.icon,
      buttons: true,
      dangerMode:true,
    }).then((willDelete)=>{
      if(willDelete){
        window.livewire.emit('delete',event.detail.id);
      }
    })
  });
</script>
</body>



   
</html>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/layouts/app.blade.php ENDPATH**/ ?>