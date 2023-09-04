

<style> .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{
        width: 100% !important;
        height: 100% !important;

        
    }</style>
<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    </div>
                    <div class="card-body">
                        <?php if(session()->has('message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>
 
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('registration')->html();
} elseif ($_instance->childHasBeenRendered('MNnRmxa')) {
    $componentId = $_instance->getRenderedChildComponentId('MNnRmxa');
    $componentTag = $_instance->getRenderedChildComponentTagName('MNnRmxa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MNnRmxa');
} else {
    $response = \Livewire\Livewire::mount('registration');
    $html = $response->html();
    $_instance->logRenderedChild('MNnRmxa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.logindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/registration_dashboard.blade.php ENDPATH**/ ?>