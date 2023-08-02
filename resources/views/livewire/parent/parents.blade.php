<div>
   @if($mode=="view")
   <h1>Parent Dashboard</h1>
     @include('livewire.parent.list_parent')
   @elseif ($mode=='create')
   <h1>Add Parent</h1>
     @include('livewire.parent.add_parent')
    @elseif ($mode=='single')    
     @include('livewire.parent.view_only_parent')   
   @else    
   <h1>View Parent</h1>
     @include('livewire.parent.update_parent')   
   @endif
</div>
