
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
} elseif ($_instance->childHasBeenRendered('l4059697239-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4059697239-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4059697239-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4059697239-0');
} else {
    $response = \Livewire\Livewire::mount('student-parent-details', []);
    $html = $response->html();
    $_instance->logRenderedChild('l4059697239-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>      
</body>      


<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parent-students-relationship.blade.php ENDPATH**/ ?>