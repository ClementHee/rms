@extends('layouts.app')

@section('content')

<body>
    <div >
        <div class="row justify-content-center">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @livewire('inventory')
            </div>
        </div>
    </div>
@endsection
