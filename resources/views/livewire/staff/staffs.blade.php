<div>
    @if($mode=="view")
    <h1 class="px-2">Staff Dashboard</h1>
        @include('livewire.staff.list_staff')

    @elseif ($mode=='create')
        <h1 class="px-2">Add New Staff</h1>
        @include('livewire.staff.add_staff')
  
    @elseif ($mode=='single')
        <h1 class="px-2">Add New Staff</h1>
        @include('livewire.staff.view_staff')

    @elseif ($mode=='edit')
        <h1 class="px-2">Add New Staff</h1>
        @include('livewire.staff.update_staff')
    @endif
    
    
    
 </div>