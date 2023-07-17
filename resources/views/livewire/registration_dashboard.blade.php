@extends('layouts.app')

<style> .kbw-signature { width: 50%; height: 200px;}
    #sig canvas{
        width: 50% !important;
        height: 50% !important;

        
    }</style>
@section('content')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
 
                        @livewire('registration')
              
            </div>
        </div>
    </div>

    
@endsection


<script>
    window.addEventListener('close-modal', event => {

        $('#parentsModal').modal('hide');
        
    })


</script>