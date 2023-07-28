<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/js/app.js'])
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
    <link rel="stylesheet" href="{{asset('css/paper-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    @livewireStyles
</head>
<body id="page-top">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
          <div class="logo">
            
            <a href="{{ url('/') }}" class="simple-text logo-normal">
              Rhema Management System
              <!-- <div class="logo-image-big">
                <img src="../assets/img/logo-big.png">
              </div> -->
            </a>
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li>
                <a href="{{ url('/') }}">
                  <p>Home</p>
                </a>
              </li>
              <li>
                <a href="{{ route('maintainence') }}">
                  <p>Maintainence</p>
                </a>
              </li>
              <li>
                <a href="{{ route('request_materials') }}">
                  
                  <p>Request Materials</p>
                </a>
              </li>
              @hasanyrole('Admin|SuperAdmin')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Student and Parents</a>
                <div class="dropdown-menu ms-5">
                  <a class="nav-link" href="{{ route('student') }}">Students</a>

                  <a class="nav-link" href="{{ route('parent') }}">Parents</a>
                  
                  <a class="nav-link" href="{{ route('student_parent') }}">All Details</a>
                </div>
              </li>
              @endrole
              @role('SuperAdmin')
                <li><a class="nav-link" href="{{ route('siblingslist') }}">Siblings List</a></li>
                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
              @endrole
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                 
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
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
                  @yield('content')
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
@livewireScripts
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

<script src="{{asset("js/core/popper.min.js")}}"></script>
<script src="{{asset("js/core//bootstrap.min.js")}}"></script>
<script src="{{asset("js/plugins/perfect-scrollbar.min.js")}}"></script>

<!-- Chart JS -->
<script src="{{ asset('js/plugins/chartjs.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>

<!-- Control Center for Paper Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>


<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

</body>



   
</html>
