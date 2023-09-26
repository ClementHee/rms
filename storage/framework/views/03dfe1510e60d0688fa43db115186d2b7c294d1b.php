<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
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
} elseif ($_instance->childHasBeenRendered('m9lMxUZ')) {
    $componentId = $_instance->getRenderedChildComponentId('m9lMxUZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('m9lMxUZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('m9lMxUZ');
} else {
    $response = \Livewire\Livewire::mount('siblingslist');
    $html = $response->html();
    $_instance->logRenderedChild('m9lMxUZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /usr/local/www/rms/resources/views/livewire/siblingslist-layout.blade.php ENDPATH**/ ?>