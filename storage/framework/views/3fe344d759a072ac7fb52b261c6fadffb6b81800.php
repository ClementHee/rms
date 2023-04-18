<div>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <?php if($updateMode): ?>
        <?php echo $__env->make('livewire.maintainence.update_issue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('livewire.maintainence.report_issue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <h1 class="text-center">Maintainence book</h1>

    <div class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="table table-striped table-sm text-center  ">
            <tr>
                <th>Issue No.</th>
                <th>Issue</th>
                <th>Location</th>
                <th>Reported By</th>
                <th>Time</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Seen</th>
                <th>Updated on</th>
                <th width="150px">Action</th>
            </tr>

            <?php $__currentLoopData = $all_maintainence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <tr>
                <td><?php echo e($issues->issueNo); ?></td>
                <td><?php echo e($issues->issue); ?></td>
                <td><?php echo e($issues->location); ?></td>
                <td><?php echo e($issues->reported_by); ?></td>
                <td><?php echo e($issues->reported_at); ?></td>
                
                <td>
                    <?php if($issues->fixed==false): ?>
                        <button type="button" class="btn btn-danger">Not Fixed</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-success">Fixed</button>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($issues->remarks==null): ?>
                        <p>None</p>
                    <?php else: ?>
                        <p><?php echo e($issues->remarks); ?></p>
                    <?php endif; ?>
                </td>
                
                <td>
                    <form>
                        <?php if($issues->fixed==true): ?>
                        
                            <button wire:click.prevent="mau(<?php echo e($issues->issueNo); ?>)" class="btn btn-info">Mark as Unfixed</button>
                        <?php else: ?>
                        
                            <button wire:click.prevent="maf(<?php echo e($issues->issueNo); ?>)" class="btn btn-info">Mark as Fixed</button>
                    
                        <?php endif; ?>
                    </form> 
                </td>
                
                <td><?php echo e($issues->updated_at); ?></td>
                <td>
                <button wire:click="edit(<?php echo e($issues->issueNo); ?>)" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete(<?php echo e($issues->issueNo); ?>)" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>  

<?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/livewire/maintainence/show_maintainence.blade.php ENDPATH**/ ?>