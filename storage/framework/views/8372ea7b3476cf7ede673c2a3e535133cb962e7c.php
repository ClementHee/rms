<div>


      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('summary-details', [])->html();
} elseif ($_instance->childHasBeenRendered('l709633715-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l709633715-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l709633715-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l709633715-0');
} else {
    $response = \Livewire\Livewire::mount('summary-details', []);
    $html = $response->html();
    $_instance->logRenderedChild('l709633715-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
  
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/all-details.blade.php ENDPATH**/ ?>