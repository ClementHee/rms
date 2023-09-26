<h1 class="text-center">Materials Request</h1>
        <form>

            <input type="hidden" wire:model="request_id">
            <div class="mb-3 form-group">
                <label for="requested_by">Requested by:</label>
                <input type="text" id="requested_by" name="requested_by" required class="form-control pb-2" placeholder="Enter Your Name" wire:model="requested_by">
                <?php $__errorArgs = ['requested_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3 form-group">
                <label for="class">Class:</label>
                <input type="text" id="class" name="class" required class="form-control" placeholder="Enter Class" wire:model="class"> 
                <?php $__errorArgs = ['class'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3 form-group">
                <label for="purpose">Purpose:</label>
                <input type="text" id="purpose" name="purpose" required class="form-control pb-2" placeholder="Inidcate for what purpose" wire:model="purpose">
                <?php $__errorArgs = ['purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="mb-3 form-group">
                <label for="item">Item:</label>
                <input type="text" id="item" name="item" required class="form-control" placeholder="Enter Title" wire:model="item"> 
                <?php $__errorArgs = ['item'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3 form-group">
                <label for="needed">Date Needed</label>
                <input type="date" id="needed" name="needed" required class="form-control" wire:model="needed">
                <?php $__errorArgs = ['needed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <button wire:click.prevent="updateRequest()" class="btn btn-dark">Update</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
        </form>


<?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/livewire/materials/update_request.blade.php ENDPATH**/ ?>