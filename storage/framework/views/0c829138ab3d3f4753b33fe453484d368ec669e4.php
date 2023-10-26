<div>
    
    <button class=" btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#newMaintainence" >Report an Issue</button>
    <?php if($this->filters=='reset'): ?>
      <button wire:click.prevent="filterUnfixed()" class="mt-2 btn btn-info btn-lg" >
        Show unfixed</button> 

    <?php elseif($this->filters=='unfixed'): ?>
        <button wire:click.prevent="filterFixed()" class="mt-2 btn btn-info btn-lg" >
        Show fixed</button>
    
    <?php else: ?>
        <button wire:click.prevent="filterReset()" class="mt-2 btn btn-info btn-lg" >
       Reset Filter</button>
   <?php endif; ?>
   
   <?php if($updateMode): ?>
        <?php echo $__env->make('livewire.maintainence.update_issue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    <h1 class="text-center">Maintainence book</h1>
    

    <div wire:poll.60s class="p-3 mt-2 shadow-lg  bg-white border border-secondary rounded ">   
        
        
        <table class="pt-3 table table-striped table-sm text-center  ">
            <tr>
             
                <th>Issue</th>
                <th>Location</th>
                <th>Reported By</th>
                <th>Time</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Status</th>
                <th>Fixed at</th>
                <th>Action</th>
            </tr>

            <?php $__currentLoopData = $all_maintainence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($issues->fixed==false): ?>
            <tr class=' bg-opacity-50'>
            <?php else: ?>
                <tr class=" bg-opacity-50 ">
            <?php endif; ?>
        
              
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
            
                        <?php if($issues->fixed==true): ?>
                        
                            <button type="button" wire:click.prevent="mau(<?php echo e($issues->issueNo); ?>)" class="btn btn-info">Mark as Unfixed</button>
                        <?php else: ?>
                        
                            <button type="button" wire:click.prevent="maf(<?php echo e($issues->issueNo); ?>)" class="btn btn-info">Mark as Fixed</button>
                    
                        <?php endif; ?>
        
                </td>
                <td>
                    
                    <?php if($issues->fixed==true): ?>
                    
                        <?php echo e($issues->updated_at); ?>

                    <?php else: ?>
                        - 
                    <?php endif; ?>
                </td>
           
                <td>
                    <button wire:click="edit(<?php echo e($issues->issueNo); ?>)" class="btn btn-primary ">Edit</button>
                    <button wire:click="delete(<?php echo e($issues->issueNo); ?>)" class="btn btn-danger">Delete</button>
                </td>

               
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        
    </div>

    <div wire:ignore.self class="modal fade" id="newMaintainence" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Report Issue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="closeModal()"></button>
                </div>
            <form> <div class="mb-3 form-group">
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
                        <input type="text" id="reported_by" name="reported_by" required class="form-control pb-2" placeholder="Enter Your Name" wire:model="reported_by">
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
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal()"
                            data-bs-dismiss="modal">Close</button>
                        <button wire:click.prevent="storeMaintainences()" class="btn btn-primary">Save</button>
                    </div>
                </form>
                
            
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/maintainence/show_maintainence.blade.php ENDPATH**/ ?>