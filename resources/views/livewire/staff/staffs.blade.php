<div>
    <div>
        @if($mode=="view")
            <h1>Staff Dashboard</h1>
            @include('livewire.staff.list_staff')
        @else    
      
            @if($mode=="view_single")
                <h1>View Staff</h1>
            @elseif($mode=="update")
                <h1>Update Staff</h1>
            @else
                <h1>Create Staff</h1>
            @endif
        
            @include('livewire.staff.staff_form')   
        @endif
    </div>
 </div>