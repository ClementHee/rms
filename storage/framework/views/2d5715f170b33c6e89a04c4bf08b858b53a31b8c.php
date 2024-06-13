

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
    $html = \Livewire\Livewire::mount('scheduled-maintainences')->html();
} elseif ($_instance->childHasBeenRendered('HKc6bbk')) {
    $componentId = $_instance->getRenderedChildComponentId('HKc6bbk');
    $componentTag = $_instance->getRenderedChildComponentTagName('HKc6bbk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HKc6bbk');
} else {
    $response = \Livewire\Livewire::mount('scheduled-maintainences');
    $html = $response->html();
    $_instance->logRenderedChild('HKc6bbk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    window.addEventListener('close-modal', event => {

        $('#newScheduledMaintainence').modal('hide');
        
    })
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/scheduled_maintainence_dashboard.blade.php ENDPATH**/ ?>