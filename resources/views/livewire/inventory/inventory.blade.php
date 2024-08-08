<div>

  <div>
    <div>
        @if($mode=="view")
            <h1>Inventory Dashboard</h1>
            @include('livewire.inventory.list_inventory')
        @else    
      
            @if($mode=="view_single")
                <h1>View Inventory</h1>
        
            @elseif($mode=="update")
                <h1>Update Inventory</h1>
            @else
                <h1>Create Inventory</h1>
            @endif
        
            @include('livewire.inventory.inventory_form')   
        @endif
    </div>
 </div>
</div>
