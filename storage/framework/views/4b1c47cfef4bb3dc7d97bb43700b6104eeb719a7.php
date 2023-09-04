

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
    $html = \Livewire\Livewire::mount('siblings-list')->html();
} elseif ($_instance->childHasBeenRendered('l2081207833-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2081207833-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2081207833-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2081207833-0');
} else {
    $response = \Livewire\Livewire::mount('siblings-list');
    $html = $response->html();
    $_instance->logRenderedChild('l2081207833-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/siblings-list.blade.php ENDPATH**/ ?>