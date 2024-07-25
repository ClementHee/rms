
<h1 class="text-center">Report an Issue</h1>
    <div class="container p-3 shadow-lg  bg-white border border-secondary rounded">

        <form>
            <?php echo csrf_field(); ?>
            <input type="hidden" wire:model="issue_no">
            <div class="mb-3 form-group">
                <label for="issue">Issue:</label>
                <input type="text" id="issue" name="issue" required class="form-control" placeholder="Enter Title" wire:model="issue"> 
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
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required class="form-control" placeholder="Enter Location" wire:model="location">
                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-3 form-group">
                <label for="reported_by">Reported By:</label>
                <input type="text" id="reported_by" name="reported_by" required class="form-control" placeholder="Enter your name" wire:model="reported_by">
                <?php $__errorArgs = ['reported_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3 form-group">
                <label for="remarks">Remarks:</label>
                <input type="text" id="remarks" name="remarks" required class="form-control pb-2" placeholder="Remarks" wire:model="remarks">
                <?php $__errorArgs = ['remarks'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>


            <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
        </form>
      
    </div>

<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/maintainence/update_issue.blade.php ENDPATH**/ ?>