<div>
    <button class="mt-2  btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newScheduledMaintainence" >Report an Issue</button>
    <?php echo $__env->make('livewire.scheduled_maintainence.add_scheduled_maintainence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($this->mode=="update"): ?>
    <?php echo $__env->make('livewire.scheduled_maintainence.edit_scheduled_maintainence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div wire:poll.60s class="p-3 mt-2 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="pt-3 table table-striped table-sm text-center  ">
            <tr>
             
                <th>Issue</th>
                <th>Recurrences</th>
                <th>Days</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php $__currentLoopData = $all_scheduled_maintainences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        

          
 
                <td><?php echo e($issues->issue); ?></td>
                <td><?php echo e($issues->recurrences); ?></td>
                <td><?php echo e($issues->days); ?></td>
                <td><?php echo e($issues->scheduled_date); ?></td>
                
                
                
             
                
           
                <td>
                    <button wire:click="edit('<?php echo e($issues->maintainence_no); ?>')"class="btn btn-primary" >Edit</button>
                    <button wire:click="deleteConfirm('<?php echo e($issues->maintainence_no); ?>')" class="btn btn-danger">Delete</button>
                </td>

               
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/scheduled_maintainence/scheduled_maintainence.blade.php ENDPATH**/ ?>