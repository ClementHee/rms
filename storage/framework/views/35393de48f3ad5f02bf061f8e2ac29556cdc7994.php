<div>
    <?php if($mode=="view"): ?>
    <h1 class="px-2">Staff Dashboard</h1>
        <?php echo $__env->make('livewire.staff.list_staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php elseif($mode=='create'): ?>
        <h1 class="px-2">Add New Staff</h1>
        <?php echo $__env->make('livewire.staff.add_staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
    <?php elseif($mode=='single'): ?>
        <h1 class="px-2">Add New Staff</h1>
        <?php echo $__env->make('livewire.staff.view_staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php elseif($mode=='edit'): ?>
        <h1 class="px-2">Add New Staff</h1>
        <?php echo $__env->make('livewire.staff.update_staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    
    
    
 </div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/staff/staffs.blade.php ENDPATH**/ ?>