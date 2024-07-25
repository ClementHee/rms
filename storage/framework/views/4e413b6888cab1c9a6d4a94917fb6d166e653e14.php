

<?php $__env->startSection('content'); ?>

<body>
    <div >
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
} elseif ($_instance->childHasBeenRendered('Tj76fsi')) {
    $componentId = $_instance->getRenderedChildComponentId('Tj76fsi');
    $componentTag = $_instance->getRenderedChildComponentTagName('Tj76fsi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Tj76fsi');
} else {
    $response = \Livewire\Livewire::mount('parents-l');
    $html = $response->html();
    $_instance->logRenderedChild('Tj76fsi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parents_dashboard.blade.php ENDPATH**/ ?>