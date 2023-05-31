<div>
    <div class="container">
   
        <div class="row">
            <div class="col-md-12">
                <?php if(session()->has('message')): ?>
                    <h5 class="alert alert-success"><?php echo e(session('message')); ?></h5>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Parents
                            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <button wire:click="create_new()" class="btn btn-primary float-end">Add New Parent</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                              
                                    <th>Name</th>
                          
                                    <th width='250px'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                   
                                        <td><?php echo e($parent->name); ?></td>
                                        
                                        <td>
                                            <button type="button"  wire:click="viewParent(<?php echo e($parent->parent_id); ?>)" class="btn btn-primary">
                                                View
                                            </button>
                                            <button type="button"  wire:click="editParent(<?php echo e($parent->parent_id); ?>)" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteParent(<?php echo e($parent->parent_id); ?>)" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                             
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <?php echo e($parents ->links()); ?>

            </div>
        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parent/list_parent.blade.php ENDPATH**/ ?>