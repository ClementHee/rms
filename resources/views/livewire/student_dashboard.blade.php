@extends('layouts.app')


@section('content')

<body>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                    </div>
                    <div class="card-body">
                       
 
                        @livewire('students')
              
            </div>
        </div>
    </div>

    
@endsection


<script>
    window.addEventListener('close-modal', event => {

        $('#parentsModal').modal('hide');
        
    })


   

</script>