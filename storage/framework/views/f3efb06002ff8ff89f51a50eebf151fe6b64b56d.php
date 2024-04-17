<div>
    <button class="mt-2  btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newTask" >Report an Issue</button>
    <?php echo $__env->make('livewire.to_do_list.add_to_do_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($this->mode=="update"): ?>
    <?php echo $__env->make('livewire.to_do_list.edit_to_do_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div wire:poll.60s class="p-3 mt-2 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="pt-3 table table-striped table-sm text-center  ">
            <tr>
             
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>
                <th>Days</th>
                <th>Action</th>
            </tr>

            <?php $__currentLoopData = $task_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td><?php echo e($task->task); ?></td>
                <td>
            
                    <?php if($task->status==true): ?>
                    
                        <button type="button" wire:click.prevent="mau('<?php echo e($task->task_no); ?>')" class="btn btn-info">Mark as Unfixed</button>
                    <?php else: ?>
                    
                        <button type="button" wire:click.prevent="maf('<?php echo e($task->task_no); ?>')" class="btn btn-info">Mark as Fixed</button>
                
                    <?php endif; ?>
    
            </td>
                <td><?php echo e($task->date); ?></td>
                <td><?php echo e($task->days); ?></td>
                
                <td>
                    <button wire:click="editToDoList('<?php echo e($task->task_no); ?>')"class="btn btn-primary" >Edit</button>
                    <button wire:click="deleteConfirm('<?php echo e($task->task_no); ?>')" class="btn btn-danger">Delete</button>
                </td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/to_do_list/to_do_list.blade.php ENDPATH**/ ?>