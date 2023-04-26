<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
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
    $html = \Livewire\Livewire::mount('relationships', [])->html();
} elseif ($_instance->childHasBeenRendered('xKGFjCN')) {
    $componentId = $_instance->getRenderedChildComponentId('xKGFjCN');
    $componentTag = $_instance->getRenderedChildComponentTagName('xKGFjCN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xKGFjCN');
} else {
    $response = \Livewire\Livewire::mount('relationships', []);
    $html = $response->html();
    $_instance->logRenderedChild('xKGFjCN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/livewire/parents_dashboard.blade.php ENDPATH**/ ?>