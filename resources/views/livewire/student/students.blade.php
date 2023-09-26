<div>
   @if($mode=="view")
   <h1 class="px-4">Student Dashboard</h1>
     @include('livewire.student.list_student')
   @elseif ($mode=='create')
   <h1 class="px-4">Add New Student</h1>
     @include('livewire.student.add_student')
  @elseif ($mode=='single')    
     @include('livewire.student.view_only_student')   
   @else    
   <h1 class="px-4">Update Student</h1>
     @include('livewire.student.update_student')   
   @endif
</div>
