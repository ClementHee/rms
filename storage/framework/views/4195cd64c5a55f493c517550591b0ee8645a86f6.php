<div>
    <div>
        <div >
            <div >
                <?php if(session()->has('message')): ?>
                    <h5 class="alert alert-success"><?php echo e(session('message')); ?></h5>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header">
                        
                        <input type="search" wire:model="search" class="form-control float-end mt-2 mx-2" placeholder="Search..." style="width: auto;" />
   
                            <select class="form-select form-select float-end mt-2 mx-2" wire:model="searchType" name="searchType" id="searchType" style="width:auto;">
                                <option value="fullname">Name</option>
                                <option value="carplate">CarPlate No.</option>
                            </select>
                            <h6 class="float-end mt-3 mx-2">Search By:</h6>
          
                        <button wire:click="create_new()" class="btn btn-primary mt-2 float-end">Add New Student</button>
                      
                        <?php if($this->filters=='reset'): ?>
                            <button wire:click.prevent="filterActive()" class="btn btn-success mt-2  float-end" >
                                Show active
                            </button> 

                        <?php elseif($this->filters=='active'): ?>
                            <button wire:click.prevent="filterWithdrawn()" class="btn btn-danger mt-2  float-end" >
                                Show Withdrawn
                            </button>
                        <?php elseif($this->filters=='withdrawn'): ?>
                            <button wire:click.prevent="filterGraduated()" class="btn btn-info mt-2  float-end" >
                                Show Graduated
                            </button>
                        <?php else: ?>
                            <button wire:click.prevent="filterReset()" class="btn btn-secondary mt-2  float-end" >
                                Reset Filter
                            </button>
                        <?php endif; ?>
                        
                        
                            
                            
                      
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
                                        <td><?php if( $student->status=='withdrawn'): ?>
                                            <button type="button" class="btn btn-danger">Withdrawn</button>
                                        <?php elseif($student->status=='graduated'): ?>
                                            <button type="button" class="btn btn-info">Graduated</button>
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
                                   
                                        <td> <?php if( $student->aft_j3_class !=""  and $student->j3_class!=""): ?>
                                            <?php echo e($student->aft_j3_class); ?>

                                        <?php elseif( $student->aft_j2_class !=""  and $student->j2_class!=""): ?> 
                                            <?php echo e($student->aft_j2_class); ?>

                                        <?php elseif($student->aft_j1_class!=""): ?>
                                            <?php echo e($student->aft_j1_class); ?>

                                        <?php else: ?>
                                            Not Assigned
                                        <?php endif; ?></td>
                                        <td class="text-center">
                                            
                                            <button type="button"  wire:click="editStudent(<?php echo e($student->student_id); ?>)" class="btn btn-primary">
                                                Edit
                                            </button>
                                            <button type="button"  wire:click="deleteConfirm(<?php echo e($student->student_id); ?>)" class="btn btn-danger ">Delete</button>
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