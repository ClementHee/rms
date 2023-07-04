<div>
  

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
} elseif ($_instance->childHasBeenRendered('HY0G75E')) {
    $componentId = $_instance->getRenderedChildComponentId('HY0G75E');
    $componentTag = $_instance->getRenderedChildComponentTagName('HY0G75E');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HY0G75E');
} else {
    $response = \Livewire\Livewire::mount('student-parent-details', []);
    $html = $response->html();
    $_instance->logRenderedChild('HY0G75E', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  </div>           
  
  
  
</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parent-students-relationship-layout.blade.php ENDPATH**/ ?>