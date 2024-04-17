
<div>
<form> <div class="mb-3 form-group">
    <label for="issue">Task:</label>
    <input type="text" id="task" name="task" required class="form-control" placeholder="Enter Maintainences" wire:model="task"> 
    
    <?php $__errorArgs = ['task'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
    <span class="text-danger">
        <?php echo e($message); ?>

    </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
    <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/to_do_list/edit_to_do_list.blade.php ENDPATH**/ ?>