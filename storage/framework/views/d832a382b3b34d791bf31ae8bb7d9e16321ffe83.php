

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
    $html = \Livewire\Livewire::mount('maintainences')->html();
} elseif ($_instance->childHasBeenRendered('OWl0ZLH')) {
    $componentId = $_instance->getRenderedChildComponentId('OWl0ZLH');
    $componentTag = $_instance->getRenderedChildComponentTagName('OWl0ZLH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OWl0ZLH');
} else {
    $response = \Livewire\Livewire::mount('maintainences');
    $html = $response->html();
    $_instance->logRenderedChild('OWl0ZLH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
              
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    window.addEventListener('close-modal', event => {

        $('#newMaintainence').modal('hide');
        
    })
</script>

<?php if(Session::has('message')): ?>
    <script>
        swal("Message","<?php echo e(Session::get('message')); ?>",'success',{
            button:true,
            button:"OK",
            timer:3000,
            dangerMode:true

        })
    </script>
    
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/maintainence_dashboard.blade.php ENDPATH**/ ?>