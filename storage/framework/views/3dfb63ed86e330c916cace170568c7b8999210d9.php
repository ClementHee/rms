<div >
    <button class="mt-2 btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newRequest" >New Request</button>
    <?php if($this->filters=='reset'): ?>
      <button wire:click.prevent="filterUnfulfilled()" class="mt-2 btn btn-info btn-lg" >
        Show Unfulfilled</button> 

    <?php elseif($this->filters=='fulfilled'): ?>
        <button wire:click.prevent="filterFulfilled()" class="mt-2 btn btn-info btn-lg" >
        Show Fulfilled</button>
    
    <?php else: ?>
        <button wire:click.prevent="filterReset()" class="mt-2 btn btn-info btn-lg" >
       Reset Filter</button>
   <?php endif; ?>
    <?php if($updateMode): ?>
        <?php echo $__env->make('livewire.materials.update_request', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    
    <h1 class="text-center">Request book</h1>


    <div wire:poll.60s class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        
        
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

            <?php if($request->fulfilled==false): ?>
            <tr class='  bg-opacity-50'>
            <?php else: ?>
            <tr class=" bg-opacity-50 ">
            <?php endif; ?>
            
                <td><?php echo e($request->date); ?></td>
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
                  
                        <?php if($request->fulfilled==true): ?>
                        
                            <button wire:click.prevent="mauf(<?php echo e($request->request_id); ?>)" class="btn btn-info">Mark as Unfulfilled</button>
                        <?php else: ?>
                        
                            <button wire:click.prevent="maf(<?php echo e($request->request_id); ?>)" class="btn btn-info">Mark as Fulfilled</button>
                    
                        <?php endif; ?>
                    
                </td>

                <td>
                    <button wire:click="editRequest(<?php echo e($request->request_id); ?>)" class="btn btn-primary">Edit</button>
                    <br>
                    <button wire:click="deleteRequest(<?php echo e($request->request_id); ?>)" class="btn btn-danger mt-1">Delete</button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

    <div wire:ignore.self class="modal fade" id="newRequest" tabindex="-1" aria-labelledby="studentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content container">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Create Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal()"></button>
            </div>
            <form>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal()"
                        data-bs-dismiss="modal">Close</button>
                    <button wire:click.prevent="storeRequest()" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/materials/show_requests.blade.php ENDPATH**/ ?>