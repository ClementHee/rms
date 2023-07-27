

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
    $html = \Livewire\Livewire::mount('maintainences')->html();
} elseif ($_instance->childHasBeenRendered('F2VOa1c')) {
    $componentId = $_instance->getRenderedChildComponentId('F2VOa1c');
    $componentTag = $_instance->getRenderedChildComponentTagName('F2VOa1c');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('F2VOa1c');
} else {
    $response = \Livewire\Livewire::mount('maintainences');
    $html = $response->html();
    $_instance->logRenderedChild('F2VOa1c', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    window.addEventListener('close-modal', event => {

        $('#newMaintainence').modal('hide');
        
    })
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/maintainence_dashboard.blade.php ENDPATH**/ ?>