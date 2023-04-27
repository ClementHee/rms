@extends('layouts.app')

@section('content')

<body>
    <div class="con">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        
                        <livewire:relationships/>
                        
                      
            </div>
        </div>
    </div>
@endsection
