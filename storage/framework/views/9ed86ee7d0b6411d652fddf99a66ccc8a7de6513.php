
<div>
    <button wire:click="list_all()" class="btn btn-primary">Back</button><br>
    <form>
        <h2><u>Parent Details</u></h2>   
                <div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label>IC number</label>
                        <input type="text" wire:model="ic_no" class="form-control">
                        <?php $__errorArgs = ['ic_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label>Occupation</label>
                        <input type="text" wire:model="occupation" class="form-control">
                        <?php $__errorArgs = ['occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <p class='d-inline px-1'>Gender:</p>
                  
                            <div class="form-check form-check-inline mb-3">
                                
                                <label class="form-check-label pr-2">Male</label>
                                <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="Male">
            
                            </div>
            
                            <div class="form-check form-check-inline  mb-3">
                                
                                <label class="form-check-label pr-2">Female</label>
                                <input  class="form-check-input" wire:model='gender' type="radio" name="gender" value="Female">
                            </div>
                        
                    </div>
                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" wire:model="company_name" class="form-control">
                        <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label>Company Address</label>
                        <input type="text" wire:model="company_add" class="form-control">
                        <?php $__errorArgs = ['company_add'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" wire:model="email" class="form-control">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label>Tel no</label>
                        <input type="text" wire:model="tel" class="form-control">
                        <?php $__errorArgs = ['tel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
  
                <button wire:click.prevent="storeParent()" class="btn btn-primary pt-1">Submit</button>
            </form>

</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parent/add_parent.blade.php ENDPATH**/ ?>