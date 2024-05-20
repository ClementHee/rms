


<?php $__env->startSection('content'); ?>

<body>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                    </div>
                    <div class="card-body">
                       
 
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('students')->html();
} elseif ($_instance->childHasBeenRendered('1DdAuxj')) {
    $componentId = $_instance->getRenderedChildComponentId('1DdAuxj');
    $componentTag = $_instance->getRenderedChildComponentTagName('1DdAuxj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1DdAuxj');
} else {
    $response = \Livewire\Livewire::mount('students');
    $html = $response->html();
    $_instance->logRenderedChild('1DdAuxj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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