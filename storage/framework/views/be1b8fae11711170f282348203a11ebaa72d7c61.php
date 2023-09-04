<?php $__env->startSection('content'); ?>
<body>

  

<script src="https://cdn.tailwindcss.com"></script> 

<div class="container mx-auto sm:px-4 py-2">

  <a href="<?php echo e(url()->previous()); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Back
  </a>
</div>
  <div class="container mx-auto sm:px-4 ">
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

                      
            
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.apptailwind', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /usr/local/www/rms/resources/views/livewire/parent-students-siblings-relationship.blade.php ENDPATH**/ ?>