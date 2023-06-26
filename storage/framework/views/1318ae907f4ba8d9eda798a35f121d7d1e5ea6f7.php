<div>
    <script src="https://cdn.tailwindcss.com"></script> 

    <div class="container mx-auto sm:px-4 py-2">

    </div>
      <div class="container mx-auto sm:px-4 ">
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('student-parent-details', [])->html();
} elseif ($_instance->childHasBeenRendered('l3700218099-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3700218099-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3700218099-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3700218099-0');
} else {
    $response = \Livewire\Livewire::mount('student-parent-details', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3700218099-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>      
</div>
<?php /**PATH /usr/local/www/rms/resources/views/livewire/all-details.blade.php ENDPATH**/ ?>