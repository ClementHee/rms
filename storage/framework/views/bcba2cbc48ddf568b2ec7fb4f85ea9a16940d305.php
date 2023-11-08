<div>
    <button wire:click=applyNew() class="btn btn-primary">Apply Leave</button>
    <div class="card">
        <div class="card-body">
            <button wire:click="fillPDF()">Click Me</button>
            <table>
                <tr>
                    <th>Staff</th>
                    <th>Dates</th>
                </tr>
                <?php $__empty_1 = true; $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                
                <tr>
                    
                    <td>
                        <?php echo e($leave->fullname); ?>

                    </td>
                    <td>
                        <?php echo e($leave->date_start); ?> - <?php echo e($leave->date_end); ?>

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
    <?php if($this->mode=='apply'): ?>
        <?php echo $__env->make('livewire.leaves.apply_leave', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/leaves/leaves.blade.php ENDPATH**/ ?>