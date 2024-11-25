
<?php $__env->startSection('content'); ?>
<div class="container-fluid px-5">
    <div class="row ">
        <div class="col">
            <div class="card">
                

                <div class="card-body">
                    <h1>Total students enrolled 2024</h1>
                    <p>Count of current enrolment: <?php echo e($count_students); ?></p>

                    <h2>Total students by class</h2>
                    <p>J1 Class: <?php echo e($j1); ?></p>
                    <p>J2 Class: <?php echo e($j2); ?></p>
                    <p>J3 Class: <?php echo e($j3); ?></p>
                    <p>J1 Afternoon Class: <?php echo e($j1_aft); ?></p>
                    <p>J2 Afternoon Class: <?php echo e($j2_aft); ?></p>
                    <p>J3 Afternoon Class: <?php echo e($j3_aft); ?></p>
                    
                </div>
                
            </div>
        </div>
   
    
        <div class="col">
            <div class="card">
                

                <div class="card-body">
                    <p>Count of current parents: <?php echo e($count_parents); ?></p>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/home.blade.php ENDPATH**/ ?>