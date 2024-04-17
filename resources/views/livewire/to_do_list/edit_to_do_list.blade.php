
<div>
<form> <div class="mb-3 form-group">
    <label for="issue">Task:</label>
    <input type="text" id="task" name="task" required class="form-control" placeholder="Enter Maintainences" wire:model="task"> 
    
    @error('task') 
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>

<div >
    <p class='d-inline px-1'>Status:</p>

        <div class="form-check form-check-inline mb-3">
            
            <label class="form-check-label pr-2">Fixed</label>
            <input  class="form-check-input" wire:model='status' type="radio" name="status" value="1">

        </div>

        <div class="form-check form-check-inline  mb-3">
            
            <label class="form-check-label pr-2">Unfixed</label>
            <input  class="form-check-input" wire:model='status' type="radio" name="status" value="0">
        </div>
    
</div>

<div class="mb-3 form-group">
    <label for="scheduled_date">Scheduled Date:</label>
    <input type="date" id="date" name="date" required class="form-control pb-2" wire:model="date">
    @error('date') <span class="text-danger">{{ $message }}</span>@enderror
</div>

<div class="mb-3 col form-group">
    <label for="days">Day: </label>
    <select class="form-select" wire:model="days" name="days" id="days">
        <option value="">Select an option</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" wire:click="resetInputFields()">Close</button>
    <button wire:click.prevent="updateToDoList()" class="btn btn-primary">Update</button>
</div>
</form>
</div>