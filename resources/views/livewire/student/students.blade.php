<div>

  <div>
    <div>
        @if($mode=="view")
            <h1>Student Dashboard</h1>
            @include('livewire.student.list_student')
        @else    
      
            @if($mode=="view_single")
                <h1>View Student</h1>
        
            @elseif($mode=="update")
                <h1>Update Student</h1>
            @else
                <h1>Create Student</h1>
            @endif
        
            @include('livewire.student.student_form')   
        @endif
    </div>
 </div>
</div>
