

<?php $__env->startSection('content'); ?>
<?php echo \Livewire\Livewire::scripts(); ?>

    <div class="container">
    <h1 class="text-center">Maintainence book</h1>
    <div class="p-3 shadow-lg  bg-white border border-secondary rounded ">   
        <a type="button" class="btn btn-primary" href="<?php echo e(route('maintainence.create')); ?>">Report an Issue</a>
        <table class="table table-striped table-sm">
            <tr>
                <th>No.</th>
                <th>Issue</th>
                <th>Location</th>
                <th>Reported By</th>
                <th>Time</th>
                <th>Status</th>
                <th>Remarks</th>
                <th width="280px">Action</th>
                <th>Updated on</th>
            </tr>

            <?php $__currentLoopData = $all_maintainence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $issues): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <tr>
                <td><?php echo e(++$i); ?></td>
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
                    <form method="POST" action="<?php echo e(route('maintainence.update', $issues->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <?php if($issues->fixed==true): ?>
                            <input type="boolean" id="fixed" name="fixed" value="0" hidden>
                            <!-- Your form fields here -->
                            <button class="btn btn-info" type="submit">Mark as Unfixed</button>
                        <?php else: ?>
                            <input type="boolean" id="fixed" name="fixed" value="1" hidden>
                        
                            <!-- Your form fields here -->
                            <button class="btn btn-info" type="submit">Mark as Fixed</button>
                    
                        <?php endif; ?>
                    </form> 
                </td>
                <td><?php echo e($issues->updated_at); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/maintainence/maintainence.blade.php ENDPATH**/ ?>