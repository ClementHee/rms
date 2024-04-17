

<div wire:ignore.self class="modal fade" id="newScheduledMaintainence" tabindex="-1" aria-labelledby="newScheduledMaintainenceModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content container">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Schedule A Maintainence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal()"></button>
            </div>
            <form> <div class="mb-3 form-group">
                <label for="issue">Issue:</label>
                <input type="text" id="issue" name="issue" required class="form-control" placeholder="Enter Maintainences" wire:model="issue"> 
                <?php $__errorArgs = ['issue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        
            <div class="mb-3 form-group">
                <p>Reccurences</p>
                <div class="form-check form-check-inline mb-3">
                            
                    <label class="form-check-label pr-2">Weekly</label>
                    <input  class="form-check-input" wire:model='recurrences' type="radio" name="recurrences" value="Weekly">
        
                </div>
        
                <div class="form-check form-check-inline  mb-3">
                    
                    <label class="form-check-label pr-2">Monthly</label>
                    <input  class="form-check-input" wire:model='recurrences' type="radio" name="recurrences" value="Monthly">
                </div>
        
                <div class="form-check form-check-inline  mb-3">
                    
                    <label class="form-check-label pr-2">Quarterly</label>
                    <input  class="form-check-input" wire:model='recurrences' type="radio" name="recurrences" value="Quarterly">
                </div>
            </div>
            
            <?php if($this->recurrences=="Weekly"): ?>
            <p>Select Days</p>
          
                <div class="mb-3 form-group">
                        <label class="form-check-label px-3" for="Monday">
                            <input type="checkbox" id="Monday" wire:model="days" value="Monday"/>
                            Monday
                        </label>
                   
                        <label class="form-check-label px-3" for="Tuesday">
                            <input type="checkbox" id="Tuesday" wire:model="days" value="Tuesday"/>
                            Tuesday
                        </label>
             
                        <label class="form-check-label px-3" for="Wednesday">
                            <input type="checkbox" id="Wednesday"wire:model="days" value="Wednesday"/>
                            Wednesday
                        </label>
                  
                       
                        <label class="form-check-label px-3" for="Thursday">
                            <input type="checkbox" id="Thursday" wire:model="days" value="Thursday"/>
                            Thursday
                        </label>
           
                        <label class="form-check-label px-3" for="Friday">
                            <input type="checkbox" id="Friday" wire:model="days" value="Friday"/>
                            Friday
                        </label>
          
                        <label class="form-check-label px-3" for="Saturday">
                            <input type="checkbox" id="Saturday"  wire:model="days" value="Saturday"/>
                            Saturday
                        </label>
        
                        <label class="form-check-label px-3" for="Sunday">
                            <input type="checkbox" id="Sunday"  wire:model="days" value="Sunday"/>
                            Sunday
                        </label>
                </div>
                
            <?php endif; ?>
        
            <div class="mb-3 form-group">
                <label for="scheduled_date">Scheduled Date:</label>
                <input type="date" id="scheduled_date" name="scheduled_date" required class="form-control pb-2" wire:model="scheduled_date">
                <?php $__errorArgs = ['scheduled_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="resetInputFields()"
                    data-bs-dismiss="modal">Close</button>
                <button wire:click.prevent="addToDoList()" class="btn btn-primary">Save</button>
            </div>
        </form>
        
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/scheduled_maintainence/add_scheduled_maintainence.blade.php ENDPATH**/ ?>