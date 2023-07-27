

<style> .kbw-signature { width: 30%; height: 200px;}
    #sig canvas{
        width: 100% !important;
        height: 100% !important;

        
    }</style>
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
    $html = \Livewire\Livewire::mount('students')->html();
} elseif ($_instance->childHasBeenRendered('GWQ7wI7')) {
    $componentId = $_instance->getRenderedChildComponentId('GWQ7wI7');
    $componentTag = $_instance->getRenderedChildComponentTagName('GWQ7wI7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GWQ7wI7');
} else {
    $response = \Livewire\Livewire::mount('students');
    $html = $response->html();
    $_instance->logRenderedChild('GWQ7wI7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>


<script>
    window.addEventListener('close-modal', event => {

        $('#parentsModal').modal('hide');
        
    })


</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/student_dashboard.blade.php ENDPATH**/ ?>