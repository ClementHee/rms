<div>
    <h1>Parent Dashboard</h1>
    <br>
   @if($mode=="view")
     @include('livewire.parent.list_parent')
   @elseif ($mode=='create')
     @include('livewire.parent.add_parent')
    @elseif ($mode=='single')    
     @include('livewire.parent.view_only_parent')   
   @else    
     @include('livewire.parent.update_parent')   
   @endif
</div>
