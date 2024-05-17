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
    <script src="https://cdn.tailwindcss.com"></script>

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
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    
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
            <ul class="flex flex-wrap list-none pl-0 mb-0">
              <li>
                <a href="{{ url('/') }}">
                  <p>Main Dashboard</p>
                </a>
              </li>

              <li class=" relative">
                <a class="inline-block py-2 px-4 no-underline  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Maintainence</a>
                <div class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded ms-5">
                  <a  class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('maintainence') }}">
                    <p>Maintainence</p>
                  </a>

                  <a  class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('scheduled_maintainence') }}">
                    <p>Scheduled Maintainence</p>
                  </a>
                  
                  <a  class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('to_do_list') }}">
                    <p>To Do List</p>
                  </a>
                </div>
              </li>
             
              @hasanyrole('Admin|SuperAdmin|EMT')
              <li class=" relative">
                <a class="inline-block py-2 px-4 no-underline  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Student and Parents</a>
                <div class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded ms-5">
                  <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('student') }}" >Students</a>

                  <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('parent') }}">Parents</a>
                  
                  <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('student_parent') }}">All Details</a>
                </div>
              </li>
              <li><a class="inline-block py-2 px-4 no-underline" href="{{ route('siblingslist') }}">Siblings List</a></li>
              @endrole
              @role('SuperAdmin')
                
                <li><a class="inline-block py-2 px-4 no-underline" href="{{ route('users.index') }}">Manage Users</a></li>
                <li><a class="inline-block py-2 px-4 no-underline" href="{{ route('roles.index') }}">Manage Role</a></li>
              @endrole

              

              <li class=" relative">
                <a class="inline-block py-2 px-4 no-underline  inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Staffs</a>
                <div class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded ms-5">
                  @role('EMT')
                  <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('staff') }}">Staffs</a>
                  @endrole
                  <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0 text-gray-900" href="{{ route('leave') }}">Staff Leaves</a>
                </div>
              </li>
        
              
            </ul>
          </div>
        </div>
        <div class="main-panel" style="height: 100vh;">
          <!-- Navbar -->
          <nav class="relative flex flex-wrap items-center content-between py-3 px-4  navbar-absolute top-0 navbar-transparent">
            <div class="container mx-auto sm:px-4 mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
              <div class="navbar-wrapper">
                <div class="navbar-toggle">
                  <button type="button" class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </button>
                </div>
                
              </div>
              <button class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
              </button>
              <div class="hidden flex-grow items-center justify-end" id="navigation">
                
                <ul class="flex flex-wrap list-reset pl-0 mb-0">
                  <li class=" btn-rotate relative">
                    <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                      </svg>
                    </button>

                    <div class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <ul class="list-unstyled">
                        <li>
                          <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                        </li>
                      </ul>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
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
            <div class="flex flex-wrap ">
              <div class="md:w-full pr-4 pl-4">
                <main class="py-4">
                  @yield('content')
              </main>
              </div>
            </div>
          </div>
         <!--<footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
            <div class="container mx-auto sm:px-4 mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
              <div class="flex flex-wrap ">
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

<script src="{{asset("js/core/popper.min.js")}}"></script>
<script src="{{asset("js/core//bootstrap.min.js")}}"></script>
<script src="{{asset("js/plugins/perfect-scrollbar.min.js")}}"></script>

<!-- Chart JS -->
<script src="{{ asset('js/plugins/chartjs.min.js')}}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>

<!-- Control Center for Paper Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>

@livewireScripts
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