

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
    $html = \Livewire\Livewire::mount('material-requests')->html();
} elseif ($_instance->childHasBeenRendered('pumoPrw')) {
    $componentId = $_instance->getRenderedChildComponentId('pumoPrw');
    $componentTag = $_instance->getRenderedChildComponentTagName('pumoPrw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pumoPrw');
} else {
    $response = \Livewire\Livewire::mount('material-requests');
    $html = $response->html();
    $_instance->logRenderedChild('pumoPrw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script>
    window.addEventListener('close-modal', event => {

        $('#newRequest').modal('hide');
        
    })
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/material_dashboard.blade.php ENDPATH**/ ?>