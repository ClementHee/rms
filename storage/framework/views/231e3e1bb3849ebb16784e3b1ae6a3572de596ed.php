


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
} elseif ($_instance->childHasBeenRendered('r7kvQlw')) {
    $componentId = $_instance->getRenderedChildComponentId('r7kvQlw');
    $componentTag = $_instance->getRenderedChildComponentTagName('r7kvQlw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('r7kvQlw');
} else {
    $response = \Livewire\Livewire::mount('students');
    $html = $response->html();
    $_instance->logRenderedChild('r7kvQlw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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