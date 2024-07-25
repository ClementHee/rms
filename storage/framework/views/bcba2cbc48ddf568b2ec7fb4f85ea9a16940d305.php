<div>
    <button wire:click=applyNew() class="btn btn-primary">Apply Leave</button>
    <div class="card">
        <div class="card-body">
            <table>
                <tr>
                    <th>Staff</th>
                    <th>Dates</th>
                    <th>Actions</th>
                </tr>

                <?php $__empty_1 = true; $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php echo e($leave->fullname); ?>

                    </td>
                    <td>
                        <?php echo e($leave->date_start); ?> - <?php echo e($leave->date_end); ?>

                    </td>
                    
                    <td>
                        <button type="button"  wire:click="viewLeave('<?php echo e($leave->leave_id); ?>')" class="btn btn-primary">
                            View
                        </button>
                        <?php if(in_array('EMT',Auth::user()->getRoleNames()->toArray())): ?>
                        <button type="button"  wire:click="deleteConfirm('<?php echo e($leave->leave_id); ?>')" class="btn btn-danger">
                            Delete
                        </button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td>
                        Nothing to Show
                    </td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php if($this->mode!='view'): ?>
        <?php echo $__env->make('livewire.leaves.leave_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/leaves/leaves.blade.php ENDPATH**/ ?>