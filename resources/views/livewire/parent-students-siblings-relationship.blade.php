@extends('layouts.apptailwind')
@section('content')
<body>

  

<script src="https://cdn.tailwindcss.com"></script> 

<div class="container mx-auto sm:px-4 py-2">

  <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Back
  </a>
</div>
  <div class="container mx-auto sm:px-4 ">
  <livewire:student-parent-details/>
</div>           

                      
            
@endsection


