<div>
  <?php if($mode=="view"): ?>
    <h1>Parent Dashboard</h1>
    <?php echo $__env->make('livewire.parent.list_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php else: ?>    

    <?php if($mode=="view_single"): ?>
      <h1>View Parent</h1>
    <?php elseif($mode=="update"): ?>
      <h1>Update Parent</h1>
    <?php else: ?>
      <h1>Create Parent</h1>
    <?php endif; ?>

  <?php echo $__env->make('livewire.parent.parent_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
  <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parent/parents.blade.php ENDPATH**/ ?>