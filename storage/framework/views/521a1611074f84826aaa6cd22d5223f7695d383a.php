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
    $html = \Livewire\Livewire::mount('students')->html();
} elseif ($_instance->childHasBeenRendered('OnleDaW')) {
    $componentId = $_instance->getRenderedChildComponentId('OnleDaW');
    $componentTag = $_instance->getRenderedChildComponentTagName('OnleDaW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OnleDaW');
} else {
    $response = \Livewire\Livewire::mount('students');
    $html = $response->html();
    $_instance->logRenderedChild('OnleDaW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('close-modal', event => {
    
            $('#parentsModal').modal('hide');
            
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /usr/local/www/rms/resources/views/livewire/student_dashboard.blade.php ENDPATH**/ ?>