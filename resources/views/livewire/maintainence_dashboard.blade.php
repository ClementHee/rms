@extends('layouts.app')

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
                        @livewire('maintainences')
            </div>
        </div>
    </div>
@endsection

<script>
    window.addEventListener('close-modal', event => {

        $('#newMaintainence').modal('hide');
        
    })
</script>