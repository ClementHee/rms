@extends('layouts.app')
@section('content')
<div class="container-fluid px-5">
    <div class="row ">
        <h1 class="text-center">Welcome</h1>
        <div class="col">
            <div class="card">
                

                <div class="card-body text-center">
                   
                        <a class="btn btn-primary btn-lg btn-block" href="{{ route('maintainence') }}">Maintainence</a>
                  
                  
                    
                </div>
                
            </div>
        </div>
   
    
        <div class="col">
            <div class="card">
                
                <div class="card-body text-center">
              
                    
                        <a class="btn btn-primary btn-lg btn-block" href="{{ route('request_materials') }}">Request Materials</a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
