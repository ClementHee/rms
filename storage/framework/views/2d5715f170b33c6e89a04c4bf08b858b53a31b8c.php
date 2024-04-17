

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
} elseif ($_instance->childHasBeenRendered('Lel7jgT')) {
    $componentId = $_instance->getRenderedChildComponentId('Lel7jgT');
    $componentTag = $_instance->getRenderedChildComponentTagName('Lel7jgT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Lel7jgT');
} else {
    $response = \Livewire\Livewire::mount('scheduled-maintainences');
    $html = $response->html();
    $_instance->logRenderedChild('Lel7jgT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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