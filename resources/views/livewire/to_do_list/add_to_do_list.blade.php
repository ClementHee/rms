

<div wire:ignore.self class="modal fade" id="newTask" tabindex="-1" aria-labelledby="newTask" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content container">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal()"></button>
            </div>
            <form> <div class="mb-3 form-group">
                <label for="issue">Task:</label>
                <input type="text" id="task" name="task" required class="form-control" placeholder="Enter Maintainences" wire:model="task"> 
                
                @error('task') 
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
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
                <button type="button" class="btn btn-secondary" wire:click="resetInputFields()"
                    data-bs-dismiss="modal">Close</button>
                <button wire:click.prevent="addToDoList()" class="btn btn-primary">Save</button>
            </div>
        </form>
        
        </div>
    </div>
</div>