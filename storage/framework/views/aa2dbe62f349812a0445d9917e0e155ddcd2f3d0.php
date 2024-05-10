

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
} elseif ($_instance->childHasBeenRendered('fjr01rl')) {
    $componentId = $_instance->getRenderedChildComponentId('fjr01rl');
    $componentTag = $_instance->getRenderedChildComponentTagName('fjr01rl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fjr01rl');
} else {
    $response = \Livewire\Livewire::mount('all-details');
    $html = $response->html();
    $_instance->logRenderedChild('fjr01rl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/all-details-layout.blade.php ENDPATH**/ ?>