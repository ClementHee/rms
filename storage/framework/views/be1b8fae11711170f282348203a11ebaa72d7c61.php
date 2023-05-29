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
    $html = \Livewire\Livewire::mount('student-parent-details', [])->html();
} elseif ($_instance->childHasBeenRendered('l2829265957-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2829265957-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2829265957-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2829265957-0');
} else {
    $response = \Livewire\Livewire::mount('student-parent-details', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2829265957-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                      
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /usr/local/www/rms/resources/views/livewire/parent-students-siblings-relationship.blade.php ENDPATH**/ ?>