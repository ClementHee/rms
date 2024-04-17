@extends('layouts.app')

@section('content')

<body>
    <div >
        <div class="row justify-content-center">
            <div >
                 
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        
                        @livewire('to-do-lists')
                        
                      
            </div>
        </div>
    </div>
@endsection

<script>
    window.addEventListener('close-modal', event => {

        $('#newTask').modal('hide');
        
    })
</script>