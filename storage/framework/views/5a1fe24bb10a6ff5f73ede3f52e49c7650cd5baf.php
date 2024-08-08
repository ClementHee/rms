<div>

  <div>
    <div>
        <?php if($mode=="view"): ?>
            <h1>Inventory Dashboard</h1>
            <?php echo $__env->make('livewire.inventory.list_inventory', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>    
      
            <?php if($mode=="view_single"): ?>
                <h1>View Inventory</h1>
        
            <?php elseif($mode=="update"): ?>
                <h1>Update Inventory</h1>
            <?php else: ?>
                <h1>Create Inventory</h1>
            <?php endif; ?>
        
            <?php echo $__env->make('livewire.inventory.inventory_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
        <?php endif; ?>
    </div>
 </div>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/inventory/inventory.blade.php ENDPATH**/ ?>