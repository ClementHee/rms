<div>

  <div>
    <div>
        <?php if($mode=="view"): ?>
            <h1>Student Dashboard</h1>
            <?php echo $__env->make('livewire.student.list_student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>    
      
            <?php if($mode=="view_single"): ?>
                <h1>View Student</h1>
            <?php elseif($mode=="update"): ?>
                <h1>Update Student</h1>
            <?php else: ?>
                <h1>Create Student</h1>
            <?php endif; ?>
        
            <?php echo $__env->make('livewire.student.student_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
        <?php endif; ?>
    </div>
 </div>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/student/students.blade.php ENDPATH**/ ?>