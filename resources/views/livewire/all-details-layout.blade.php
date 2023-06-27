  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Fonts -->
    
      <script src="https://cdn.tailwindcss.com"></script> 
      <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      
      @vite(['resources/js/app.js'])
      @livewireStyles
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
    
      @livewireStyles
      
      
  </head>
  <body>
      <div id="app">
        
<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="pl-10 max-w-screen-xl flex flex-wrap items-center  ">
    <a href="{{ url('/') }}" class="flex items-center">
        <span class="py-3 px-1 text-2xl whitespace-nowrap dark:text-black">Rhema Management System</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-dropdown" aria-controls="navbar-dropdown" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="pl-4 flex flex-col font-medium  md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white  ">

        <li>
          <a href="{{ route('maintainence') }}" class="inline-block  text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Maintainences</a>
        </li>
        <li>
          <a href="{{ route('request_materials') }}" class="inline-block  text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Request Materials</a>
        </li>

        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-black md:dark:hover:text-blue-500 dark:focus:text-black dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Manage Students and Parents  <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="{{ route('student') }}" class="block px-4 py-2 ">Students</a>
                  </li>
                  <li>
                    <a href="{{ route('parent') }}" class="block px-4 py-2 ">Parents</a>
                  </li>
                  <li>
                    <a href="{{ route('student_parent') }}" class="block px-4 py-2">All Details</a>
                  </li>
                </ul>
                
            </div>
        </li>
        @role('SuperAdmin')
        <li>
          <a href="{{ route('users.index') }}" class="inline-block text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent">Manage Users</a>
        </li>
        <li>
          <a href="{{ route('roles.index') }}" class="inline-block text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent">Manage Role</a>
        </li>
        @endrole
        <li>
          <a id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2" class="flex items-center justify-between w-full text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-black md:dark:hover:text-blue-500 dark:focus:text-black dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"> {{ Auth::user()->name }}<svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar2" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="" aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="{{ route('logout') }}" class="inline-block px-4 py-2"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  @csrf
              </form>
              
          </div>
      </li>
      </ul>
    </div>
  </div>
</nav>

        

          
      </div>@livewire('all-details')
  @livewireScripts
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
  </body>



    
  </html>