<div>
   <?php if($mode=="view"): ?>
   <h1>Parent Dashboard</h1>
     <?php echo $__env->make('livewire.parent.list_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($mode=='create'): ?>
   <h1>Add Parent</h1>
     <?php echo $__env->make('livewire.parent.add_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($mode=='single'): ?>    
     <?php echo $__env->make('livewire.parent.view_only_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php else: ?>    
   <h1>View Parent</h1>
     <?php echo $__env->make('livewire.parent.update_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/parent/parents.blade.php ENDPATH**/ ?>