

<?php $__env->startSection('content'); ?>
<h1 class="text-center">Report an Issue</h1>
    <div class="container p-3 shadow-lg  bg-white border border-secondary rounded">
        <form method="POST" action="<?php echo e(route('maintainence.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3 form-group">
            <label for="issue">Issue:</label>
            <input type="text" id="issue" name="issue" required class="form-control">
            </div>

            <div class="mb-3 form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required class="form-control">
            </div>

            <div class="mb-3 form-group">
            <label for="reportedby">Reported By:</label>
            <input type="text" id="reportedby" name="reportedby" required class="form-control pb-2">
            </div>
            
            <input type="text" id="reportedat" name="reportedat"  value="<?php echo e($current_date->format('Y-m-d H-i-s')); ?>" class="pb-2" hidden>

            <button type="submit" class="btn btn-primary pt-1">Submit</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/maintainence/create_maintainence.blade.php ENDPATH**/ ?>