<div>
    <div>
        <div >
            <div >
                <?php if(session()->has('message')): ?>
                    <h5 class="alert alert-success"><?php echo e(session('message')); ?></h5>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <input type="search" wire:model="search" class="form-control float-end mt-2 mx-2" placeholder="Search..." style="width: 230px" />
                        <button wire:click="create_new()" class="btn btn-primary float-end">Add New Item</button>

                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Serial Number</th>
                                    <th>Date Purchased</th>
                                    <th>Warranty</th>
                                    <th>Remarks</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                      
                                        <td wire:click="viewItem(<?php echo e($item->product_id); ?>)" onMouseOver="this.style.color='Blue'; this.style.cursor='pointer'" onMouseOut="this.style.color='Black'" ><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->category); ?></td>
                                        <td><?php echo e($item->serial_no); ?></td>
                                        <td><?php echo e($item->date_purchased); ?></td>
                                        <td><?php echo e($item->warranty); ?></td>
                                        <td><?php echo e($item->remarks); ?></td>
                                      
                                        <td class="text-center">
                                            
                                            <button type="button"  wire:click="editItem(<?php echo e($item->product_id); ?>)" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteConfirm(<?php echo e($item->product_id); ?>)" class="btn btn-danger ">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8">No Record Found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                           
                        </table>
                        
                    </div>
                    <?php echo e($inventory ->links()); ?>

                </div>
            </div>
        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/inventory/list_inventory.blade.php ENDPATH**/ ?>