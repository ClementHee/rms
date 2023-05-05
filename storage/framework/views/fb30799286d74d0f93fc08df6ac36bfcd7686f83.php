<?php $__env->startSection('content'); ?>

<body>
    <div class="con">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    
                    <div class="card-body">
                        <?php if(session()->has('message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>
                        
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('relationships', [])->html();
} elseif ($_instance->childHasBeenRendered('l3257811559-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3257811559-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3257811559-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3257811559-0');
} else {
    $response = \Livewire\Livewire::mount('relationships', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3257811559-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/livewire/parent-students-siblings-relationship.blade.php ENDPATH**/ ?>