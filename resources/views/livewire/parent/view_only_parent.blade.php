<div>
    <button wire:click="list_all()" class="btn btn-primary">Back</button><br>
    <form>
        @csrf
        <input type="hidden" wire:model="parent_id">
                <div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input readonly type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>IC number</label>
                        <input readonly type="text" wire:model="ic_no" class="form-control">
                        @error('ic_no') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Occupation</label>
                        <input  readonly type="text" wire:model="occupation" class="form-control">
                        @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <p class='d-inline px-1'>Gender:</p>
                  
                            <div class="form-check form-check-inline mb-3">
                                
                                <label class="form-check-label pr-2">Male</label>
                                <input disabled class="form-check-input" wire:model='gender' type="radio" name="gender" value="Male">
            
                            </div>
            
                            <div class="form-check form-check-inline  mb-3">
                                
                                <label class="form-check-label pr-2">Female</label>
                                <input disabled class="form-check-input" wire:model='gender' type="radio" name="gender" value="Female">
                            </div>
                        
                    </div>
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input  readonly type="text" wire:model="company_name" class="form-control">
                        @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Company Address</label>
                        <input readonly type="text" wire:model="company_add" class="form-control">
                        @error('company_add') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input readonly type="email" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tel no</label>
                        <input readonly type="text" wire:model="tel" class="form-control">
                        @error('tel') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
  
            </form>

</div>
