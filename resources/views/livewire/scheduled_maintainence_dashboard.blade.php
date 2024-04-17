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
                        
                        @livewire('scheduled-maintainences')
                        
                      
            </div>
        </div>
    </div>
@endsection

<script>
    window.addEventListener('close-modal', event => {

        $('#newScheduledMaintainence').modal('hide');
        
    })
</script>