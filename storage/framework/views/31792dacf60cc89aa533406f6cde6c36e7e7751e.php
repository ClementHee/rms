<div>
    

    <?php if($updateMode): ?>
        <?php echo $__env->make('livewire.materials.update_request', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('livewire.materials.new_request', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <h1 class="text-center">Request book</h1>


    <div class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="table table-striped table-sm text-center  ">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Class By</th>
                <th>Purpose</th>
                <th>Item</th>
                <th>Date Needed</th>
                <th>Status</th>
                <th>Fulfilled</th>
                <th width="150px">Action</th>
            </tr>

            <?php $__currentLoopData = $all_request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <tr>
                <td><?php echo e($request->request_id); ?></td>
                <td><?php echo e($request->requested_by); ?></td>
                <td><?php echo e($request->class); ?></td>
                <td><?php echo e($request->purpose); ?></td>
                <td><?php echo e($request->item); ?></td>
                <td><?php echo e($request->needed); ?></td>
                <td>
                    <?php if($request->fulfilled==false): ?>
                        <button type="button" class="btn btn-danger">Not Fulfilled</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-success">Fulfilled</button>
                    <?php endif; ?>
                </td>
                
                
                <td>
                    <form>
                        <?php if($request->fulfilled==true): ?>
                        
                            <button wire:click.prevent="mauf(<?php echo e($request->request_id); ?>)" class="btn btn-info">Mark as Unfulfilled</button>
                        <?php else: ?>
                        
                            <button wire:click.prevent="maf(<?php echo e($request->request_id); ?>)" class="btn btn-info">Mark as Fulfilled</button>
                    
                        <?php endif; ?>
                    </form> 
                </td>

                <td>
                    <button wire:click="editRequest(<?php echo e($request->request_id); ?>)" class="btn btn-primary">Edit</button>
                    <button wire:click="deleteRequest(<?php echo e($request->request_id); ?>)" class="btn btn-danger ">Delete</button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>  

<?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/livewire/materials/show_requests.blade.php ENDPATH**/ ?>