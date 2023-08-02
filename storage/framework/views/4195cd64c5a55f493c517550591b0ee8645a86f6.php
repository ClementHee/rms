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
                        <button wire:click="create_new()" class="btn btn-primary float-end">Add New Student</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>D.O.B</th>
                                    <th>Birth Cert</th>
                                    <th>Status</th>
                                    <th>Morning Class</th>
                                    <th>Afternoon Class</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                   
                                        <td wire:click="viewStudent(<?php echo e($student->student_id); ?>)" onMouseOver="this.style.color='Blue'; this.style.cursor='pointer'" onMouseOut="this.style.color='Black'" ><?php echo e($student->first_name." ".$student->last_name); ?></td>
                                        <td><?php echo e($student->gender); ?></td>
                                        <td><?php echo e($student->dob); ?></td>
                                        <td><?php echo e($student->birth_cert_no); ?></td>
                                        <td><?php if( $student->status=='unactive'): ?>
                                            <button type="button" class="btn btn-danger">Withdrawn</button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-success">Enrolled</button>
                                        <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if( $student->j3_class !=""): ?>
                                                <?php echo e($student->j3_class); ?>

                                            <?php elseif( $student->j2_class !=""): ?>
                                                <?php echo e($student->j2_class); ?>

                                            <?php elseif($student->j1_class): ?>
                                                <?php echo e($student->j1_class); ?>

                                            <?php else: ?>
                                                Not Assigned
                                            <?php endif; ?>
                                        </td>
                                   
                                        <td> <?php if( $student->aft_j3_class !=""): ?>
                                            <?php echo e($student->aft_j3_class); ?>

                                        <?php elseif( $student->aft_j2_class !=""): ?>
                                            <?php echo e($student->aft_j2_class); ?>

                                        <?php elseif($student->aft_j1_class!=""): ?>
                                            <?php echo e($student->aft_j1_class); ?>

                                        <?php else: ?>
                                            Not Assigned
                                        <?php endif; ?></td>
                                        <td>
                                            
                                            <button type="button"  wire:click="editStudent(<?php echo e($student->student_id); ?>)" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteStudent(<?php echo e($student->student_id); ?>)" class="btn btn-danger mt-3">Delete</button>
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
                    <?php echo e($students ->links()); ?>

                </div>
            </div>
        </div>
    </div>

</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/student/list_student.blade.php ENDPATH**/ ?>