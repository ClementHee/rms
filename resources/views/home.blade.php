@extends('layouts.app')
@section('content')
<div class="container-fluid px-5">
    <div class="row ">
        <div class="col">
            <div class="card">
                

                <div class="card-body">
                    <h1>Total students enrolled 2023</h1>
                    <p>Count of current enrolment: {{$count_students}}</p>

                    <h2>Total students by class</h2>
                    <p>J1 Class: {{$j1}}</p>
                    <p>J2 Class: {{$j2}}</p>
                    <p>J3 Class: {{$j3}}</p>
                    <p>J1 Afternoon Class: {{$j1_aft}}</p>
                    <p>J2 Afternoon Class: {{$j2_aft}}</p>
                    <p>J3 Afternoon Class: {{$j3_aft}}</p>
                    
                </div>
                
            </div>
        </div>
   
    
        <div class="col">
            <div class="card">
                

                <div class="card-body">
                    <p>Count of current parents: {{$count_parents}}</p>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
