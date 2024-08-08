<div>
    <form id="form2" class=" p-4 shadow-lg  bg-white border border-secondary rounded" <?php echo e($mode=="view_single"?'readonly':''); ?> >
        <?php echo csrf_field(); ?>
        <div>
        <div class="row">  
            <div class="mb-3 form-group col">
                <label for="category">Category:</label>
                <select class="form-select" wire:model="category" name="category" id="category">
                    <option value="" <?php echo e($mode=="view_single"?'disabled':''); ?>>Select an option</option>
                    <option value="Stationary" <?php echo e($mode=="view_single"?'disabled':''); ?>>Stationary</option>
                    <option value="Furniture"<?php echo e($mode=="view_single"?'disabled':''); ?>>Furniture</option>
                    <option value="Equipment"<?php echo e($mode=="view_single"?'disabled':''); ?>>Equipment</option>
                    <option value="Building"<?php echo e($mode=="view_single"?'disabled':''); ?>>Building</option>
                    <option value="Teaching Resource"<?php echo e($mode=="view_single"?'disabled':''); ?>>Teaching Resource</option>
                    <option value="Other"<?php echo e($mode=="view_single"?'disabled':''); ?>>Other</option>
                </select>
            </div>

            <div class="mb-3 form-group col">
                <label for="name">Product Name:</label>
                <input type="text" <?php echo e($mode=="view_single"?'readonly':''); ?> id="name" name="name" required class="form-control" placeholder="Product Name" wire:model="name"> 
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3 form-group col">
                <label for="serial_no">Serial Number:</label>
                <input type="text" <?php echo e($mode=="view_single"?'readonly':''); ?>  id="serial_no" name="serial_no" required class="form-control" placeholder="Serial No" wire:model="serial_no"> 
                <?php $__errorArgs = ['serial_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
        </div>
        <div class="row">
            <div class="mb-3 form-group col">
                <label for="date_purchased">Date Purchased:</label>
                <input <?php echo e($mode=="view_single"?'disabled':''); ?> type="date" id="date_purchased" name="date_purchased" required class="form-control" placeholder="Date Purchased" wire:model="date_purchased"> 
            </div>

            <div class="mb-3 form-group col">
                <label for="warranty">Warranty:</label>
                <input <?php echo e($mode=="view_single"?'disabled':''); ?> type="date" id="warranty" name="warranty" required class="form-control" placeholder="Warranty" wire:model="warranty"> 
            </div>

            <div class="mb-3 form-group col">
                <label for="remarks">Remarks:</label>
                <input type="text" <?php echo e($mode=="view_single"?'readonly':''); ?>  id="remarks" name="remarks" required class="form-control" placeholder="Remarks" wire:model="remarks"> 
                <?php $__errorArgs = ['remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <?php if($mode!="view_single"): ?>
        
        <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
     
            <?php if($mode=="update"): ?>
                <button wire:click.prevent="updateInventory()" class="btn btn-primary pt-1">Update</button>
            <?php else: ?>

                <button wire:click.prevent="recordInventory()" class="btn btn-primary">Submit</button>
            <?php endif; ?>
    
        <?php else: ?>
            <button wire:click="list_all()" class="btn btn-danger">Cancel</button>
        <?php endif; ?>
            
    </div>
    </form>
</div>


<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/inventory/inventory_form.blade.php ENDPATH**/ ?>