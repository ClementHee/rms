
<?php $__env->startSection('content'); ?>
<div class="container-fluid px-5">
    <div class="row ">
        <h1 class="text-center">Welcome</h1>
        <div class="col">
            <div class="card">
                

                <div class="card-body text-center">
                   
                        <a class="btn btn-primary btn-lg btn-block" href="<?php echo e(route('maintainence')); ?>">Maintainence</a>
                  
                  
                    
                </div>
                
            </div>
        </div>
   
    
        <div class="col">
            <div class="card">
                
                <div class="card-body text-center">
              
                    
                        <a class="btn btn-primary btn-lg btn-block" href="<?php echo e(route('request_materials')); ?>">Request Materials</a>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/userdashboard.blade.php ENDPATH**/ ?>