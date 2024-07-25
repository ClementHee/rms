<div>
    <button wire:click="list_all()" class="btn btn-primary">Back</button><br>
    <form>
        <h2>
            <u>Parent Details</u>
        </h2>   
        <div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" wire:model="name" class="form-control">
                 @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label>IC number</label>
                <input type="text" wire:model="ic_no" class="form-control">
                @error('ic_no') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label>Occupation</label>
                <input type="text" wire:model="occupation" class="form-control">
                @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <p class='d-inline px-1'>Gender:</p>
                  
                <div class="form-check form-check-inline mb-3">  
                    <label class="form-check-label pr-2">Male</label>
                    <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="Male">
                </div>
            
                <div class="form-check form-check-inline  mb-3">      
                    <label class="form-check-label pr-2">Female</label>
                    <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="Female">
                </div>     
            </div>

            <div class="mb-3">
                <label>Company Name</label>
                <input type="text" wire:model="company_name" class="form-control">
                @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="mb-3">
                <label>Company Address</label>
                <input type="text" wire:model="company_add" class="form-control">
                @error('company_add') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" wire:model="email" class="form-control">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label>Tel no</label>
                <input type="text" wire:model="tel" class="form-control">
                @error('tel') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        
        @if ($this->mode!="view_single")
            <button wire:click="list_all()" class="btn btn-secondary">Cancel</button>

            @if($this->mode=="update")
                <button wire:click.prevent="updateParent()" class="btn btn-primary pt-1">Update</button>
            @else
    
            <button wire:click.prevent="storeParent()" class="btn btn-primary">Submit</button>
            @endif
        @else
            <button wire:click="list_all()" class="btn btn-secondary">Cancel</button>
        @endif
    </form>
</div>
