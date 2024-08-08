<div>
    <form id="form2" class=" p-4 shadow-lg  bg-white border border-secondary rounded" {{$mode=="view_single"?'readonly':''}} >
        @csrf
        <div>
        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="category">Category:</label>
                <select class="form-select" wire:model="category" name="category" id="category">
                    <option value="" {{$mode=="view_single"?'disabled':''}}>Select an option</option>
                    <option value="Stationary" {{$mode=="view_single"?'disabled':''}}>Stationary</option>
                    <option value="Furniture"{{$mode=="view_single"?'disabled':''}}>Furniture</option>
                    <option value="Equipment"{{$mode=="view_single"?'disabled':''}}>Equipment</option>
                    <option value="Building"{{$mode=="view_single"?'disabled':''}}>Building</option>
                    <option value="Teaching Resource"{{$mode=="view_single"?'disabled':''}}>Teaching Resource</option>
                    <option value="Other"{{$mode=="view_single"?'disabled':''}}>Other</option>
                </select>
            </div>

            <div class="mb-3 form-group col">
                <label for="name">Product Name:</label>
                <input type="text" {{$mode=="view_single"?'readonly':''}} id="name" name="name" required class="form-control" placeholder="Product Name" wire:model="name"> 
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group col">
                <label for="serial_no">Serial Number:</label>
                <input type="text" {{$mode=="view_single"?'readonly':''}}  id="serial_no" name="serial_no" required class="form-control" placeholder="Serial No" wire:model="serial_no"> 
                @error('serial_no') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
        </div>
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="date_purchased">Date Purchased:</label>
                <input {{$mode=="view_single"?'disabled':''}} type="date" id="date_purchased" name="date_purchased" required class="form-control" placeholder="Date Purchased" wire:model="date_purchased"> 
            </div>

            <div class="mb-3 form-group col">
                <label for="warranty">Warranty:</label>
                <input {{$mode=="view_single"?'disabled':''}} type="date" id="warranty" name="warranty" required class="form-control" placeholder="Warranty" wire:model="warranty"> 
            </div>

            <div class="mb-3 form-group col">
                <label for="remarks">Remarks:</label>
                <input type="text" {{$mode=="view_single"?'readonly':''}}  id="remarks" name="remarks" required class="form-control" placeholder="Remarks" wire:model="remarks"> 
                @error('remarks') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        @if ($mode!="view_single")
        
        <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
     
            @if($mode=="update")
                <button wire:click.prevent="updateInventory()" class="btn btn-primary pt-1">Update</button>
            @else

                <button wire:click.prevent="recordInventory()" class="btn btn-primary">Submit</button>
            @endif
    
        @else
            <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
        @endif
            
    </div>
    </form>
</div>


