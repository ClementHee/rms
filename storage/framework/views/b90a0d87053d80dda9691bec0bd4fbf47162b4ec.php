<div>
   <h1 class="px-4">Student Dashboard</h1>
   <?php if($mode=="view"): ?>
     <?php echo $__env->make('livewire.student.list_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($mode=='create'): ?>
     <?php echo $__env->make('livewire.student.add_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php elseif($mode=='single'): ?>    
     <?php echo $__env->make('livewire.student.view_only_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php else: ?>    
     <?php echo $__env->make('livewire.student.update_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
   <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/student/students.blade.php ENDPATH**/ ?>