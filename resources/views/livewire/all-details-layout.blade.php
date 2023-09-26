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
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
     <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
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
                <a class="inline-block pt-4 pb-3 px-4 no-underline" href="{{ url('/') }}">
                  Main Dashboard
                </a>
              </li>
              
              <li>
                <a class="inline-block py-3 px-4 no-underline" href="{{ route('maintainence') }}">
                  Maintainence
                </a>
              </li>
              <li>
                <a class="inline-block py-3 px-4 no-underline" href="{{ route('request_materials') }}">
                  
                  Request Materials
                </a>
              </li>
              <li>
                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="  px-4 py-3 md:hover:text-blue-700 md:p-0 flex items-center justify-between w-full md:w-auto">Student And Parent <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar" class="ms-4 hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow w-44">
                    <ul class="py-1" aria-labelledby="dropdownLargeButton">
                    <li>
                      <a href="{{ route('student') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Students</a>
                    </li>
                    <li>
                      <a href="{{ route('student_parent') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">All Details</a>
                    </li>
                    <li>
                      <a href="{{ route('siblingslist') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Siblings List</a>
                    </li>
                    </ul>
                   
                </div>
            </li>
              @hasanyrole('Admin|SuperAdmin')
             
              <li><a class="inline-block py-3 px-4 no-underline" href="{{ route('siblingslist') }}">Siblings List</a></li>
              @endrole
              @role('SuperAdmin')
                
                <li><a class="inline-block py-3 px-4 no-underline" href="{{ route('users.index') }}">Manage Users</a></li>
                <li><a class="inline-block py-3 px-4 no-underline" href="{{ route('roles.index') }}">Manage Role</a></li>
              @endrole
            </ul>
          </div>
        </div>
        <div class="main-panel" style="height: 100vh;">
          <!-- Navbar -->
        
         
    <nav class="border-gray-200">
      <div class="container  flex flex-wrap items-center justify-end">
          
    
          <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center type="button">{{ Auth::user()->name }} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg></button>
          <!-- Dropdown menu -->
          <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm" aria-labelledby="dropdownDefaultButton">
                <li>
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">    {{ __('Logout') }}</a>
                </li>
                
              </ul>
          </div>
             
          </ul>
   
      </div>
      </nav>

          <!-- End Navbar -->
          <div class="content">
            <div class="flex flex-wrap ">
              <div class="md:w-full pr-4 pl-4">
                
                  @livewire('all-details')
              
              </div>
            </div>
          </div>
         <!--<footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
            <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
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