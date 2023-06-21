<div>
   <h1 class="px-4">Student Dashboard</h1>
   @if($mode=="view")
     @include('livewire.student.list_student')
   @elseif ($mode=='create')
     @include('livewire.student.add_student')
  @elseif ($mode=='single')    
     @include('livewire.student.view_only_student')   
   @else    
     @include('livewire.student.update_student')   
   @endif
</div>
