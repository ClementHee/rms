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
    $html = \Livewire\Livewire::mount('to-do-lists')->html();
} elseif ($_instance->childHasBeenRendered('9xA0yAl')) {
    $componentId = $_instance->getRenderedChildComponentId('9xA0yAl');
    $componentTag = $_instance->getRenderedChildComponentTagName('9xA0yAl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9xA0yAl');
} else {
    $response = \Livewire\Livewire::mount('to-do-lists');
    $html = $response->html();
    $_instance->logRenderedChild('9xA0yAl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    window.addEventListener('close-modal', event => {

        $('#newTask').modal('hide');
        
    })
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/to_do_list_dashboard.blade.php ENDPATH**/ ?>