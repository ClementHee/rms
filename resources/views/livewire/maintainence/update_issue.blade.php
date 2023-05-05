
<h1 class="text-center">Report an Issue</h1>
    <div class="container p-3 shadow-lg  bg-white border border-secondary rounded">

        <form>
            @csrf
            <input type="hidden" wire:model="issue_no">
            <div class="mb-3 form-group">
                <label for="issue">Issue:</label>
                <input type="text" id="issue" name="issue" required class="form-control" placeholder="Enter Title" wire:model="issue"> 
                @error('issue') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required class="form-control" placeholder="Enter Location" wire:model="location">
                @error('location') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            
            <div class="mb-3 form-group">
                <label for="reported_by">Reported By:</label>
                <input type="text" id="reported_by" name="reported_by" required class="form-control" placeholder="Enter your name" wire:model="reported_by">
                @error('reported_by') <span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="mb-3 form-group">
                <label for="remarks">Remarks:</label>
                <input type="text" id="remarks" name="remarks" required class="form-control pb-2" placeholder="Remarks" wire:model="remarks">
                @error('remarks') <span class="text-danger">{{ $message }}</span>@enderror
            </div>


            <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
        </form>
      
    </div>

