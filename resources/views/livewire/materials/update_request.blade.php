<h1 class="text-center">Materials Request</h1>
        <form>

            <input type="hidden" wire:model="request_id">
            <div class="mb-3 form-group">
                <label for="requested_by">Requested by:</label>
                <input type="text" id="requested_by" name="requested_by" required class="form-control pb-2" placeholder="Enter Your Name" wire:model="requested_by">
                @error('requested_by') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="class">Class:</label>
                <input type="text" id="class" name="class" required class="form-control" placeholder="Enter Class" wire:model="class"> 
                @error('class') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="purpose">Purpose:</label>
                <input type="text" id="purpose" name="purpose" required class="form-control pb-2" placeholder="Inidcate for what purpose" wire:model="purpose">
                @error('purpose') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
            <div class="mb-3 form-group">
                <label for="item">Item:</label>
                <input type="text" id="item" name="item" required class="form-control" placeholder="Enter Title" wire:model="item"> 
                @error('item') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="item2">Item:</label>
                <input type="text" id="item2" name="item2" required class="form-control" placeholder="Enter Items (Row 2 Optional)" wire:model="item2"> 
                @error('item2') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="needed">Date Needed</label>
                <input type="date" id="needed" name="needed" required class="form-control" wire:model="needed">
                @error('needed') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            
            <button wire:click.prevent="updateRequest()" class="btn btn-dark">Update</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
        </form>


