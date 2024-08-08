

<?php $__env->startSection('content'); ?>

<body>
    <div>
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
    $html = \Livewire\Livewire::mount('siblingslist')->html();
} elseif ($_instance->childHasBeenRendered('EZiptW9')) {
    $componentId = $_instance->getRenderedChildComponentId('EZiptW9');
    $componentTag = $_instance->getRenderedChildComponentTagName('EZiptW9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EZiptW9');
} else {
    $response = \Livewire\Livewire::mount('siblingslist');
    $html = $response->html();
    $_instance->logRenderedChild('EZiptW9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/siblingslist-layout.blade.php ENDPATH**/ ?>