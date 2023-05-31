

<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div >
                 
                    <div class="card-body">
                        <?php if(session()->has('message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>
                        
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('parents-l')->html();
} elseif ($_instance->childHasBeenRendered('pTrz2M8')) {
    $componentId = $_instance->getRenderedChildComponentId('pTrz2M8');
    $componentTag = $_instance->getRenderedChildComponentTagName('pTrz2M8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pTrz2M8');
} else {
    $response = \Livewire\Livewire::mount('parents-l');
    $html = $response->html();
    $_instance->logRenderedChild('pTrz2M8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parents_dashboard.blade.php ENDPATH**/ ?>