<div>
    <h1>Student Dashboard</h1>
   <?php if($mode=="view"): ?>
     <?php echo $__env->make('livewire.parent.list_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($mode=='create'): ?>
     <?php echo $__env->make('livewire.parent.add_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($mode=='single'): ?>    
     <?php echo $__env->make('livewire.parent.view_only_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php else: ?>    
     <?php echo $__env->make('livewire.parent.update_parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/livewire/parent/parents.blade.php ENDPATH**/ ?>