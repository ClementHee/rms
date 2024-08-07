

<?php $__env->startSection('content'); ?>

<body>
    <div >
        <div class="row justify-content-center">
            <div class="card-body">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory')->html();
} elseif ($_instance->childHasBeenRendered('URvg8V1')) {
    $componentId = $_instance->getRenderedChildComponentId('URvg8V1');
    $componentTag = $_instance->getRenderedChildComponentTagName('URvg8V1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('URvg8V1');
} else {
    $response = \Livewire\Livewire::mount('inventory');
    $html = $response->html();
    $_instance->logRenderedChild('URvg8V1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/inventory_dashboard.blade.php ENDPATH**/ ?>