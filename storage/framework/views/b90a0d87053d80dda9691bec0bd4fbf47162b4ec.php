<div>
   
   <?php if($mode=="view"): ?>
   <h1 class="px-4">Student Dashboard</h1>
     <?php echo $__env->make('livewire.student.list_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($mode=='create'): ?>
   <h1 class="px-4">Add New Student</h1>
     <?php echo $__env->make('livewire.student.add_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php elseif($mode=='single'): ?>    
     <?php echo $__env->make('livewire.student.view_only_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php else: ?>    
   <h1 class="px-4">Update Student</h1>
     <?php echo $__env->make('livewire.student.update_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/student/students.blade.php ENDPATH**/ ?>