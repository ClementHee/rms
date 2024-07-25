

<?php $__env->startSection('content'); ?>

<body>
    <div >
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
    $html = \Livewire\Livewire::mount('leaves')->html();
} elseif ($_instance->childHasBeenRendered('UdSrY9v')) {
    $componentId = $_instance->getRenderedChildComponentId('UdSrY9v');
    $componentTag = $_instance->getRenderedChildComponentTagName('UdSrY9v');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UdSrY9v');
} else {
    $response = \Livewire\Livewire::mount('leaves');
    $html = $response->html();
    $_instance->logRenderedChild('UdSrY9v', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/leaves_dashboard.blade.php ENDPATH**/ ?>