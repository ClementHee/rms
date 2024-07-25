<div>

    <div>
        <?php if($mode=="view"): ?>
          <h1>Staff Dashboard</h1>
          <?php echo $__env->make('livewire.staff.list_staff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>    
      
          <?php if($mode=="view_single"): ?>
            <h1>View Staff</h1>
          <?php elseif($mode=="update"): ?>
            <h1>Update Staff</h1>
          <?php else: ?>
            <h1>Create Staff</h1>
          <?php endif; ?>
      
        <?php echo $__env->make('livewire.staff.staff_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
        <?php endif; ?>
      </div>
      
    
    
    
    
 </div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/staff/staffs.blade.php ENDPATH**/ ?>