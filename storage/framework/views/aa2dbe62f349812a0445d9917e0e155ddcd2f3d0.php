

<?php $__env->startSection('content'); ?>

<body>
    <div>
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
    $html = \Livewire\Livewire::mount('all-details')->html();
} elseif ($_instance->childHasBeenRendered('wQbXzYc')) {
    $componentId = $_instance->getRenderedChildComponentId('wQbXzYc');
    $componentTag = $_instance->getRenderedChildComponentTagName('wQbXzYc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wQbXzYc');
} else {
    $response = \Livewire\Livewire::mount('all-details');
    $html = $response->html();
    $_instance->logRenderedChild('wQbXzYc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/all-details-layout.blade.php ENDPATH**/ ?>