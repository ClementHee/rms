<html>
<head>
    <title>
        Export Data
    </title>
</head>
<body>
    <h1 class="text-center">Request book</h1>
    <div wire:poll.60s class="p-3 shadow-lg  bg-white border border-secondary rounded ">    
        <table cellspacing="5px" cellpadding="5px"  border="1" class="table table-bordered" style="table-layout:fixed; border: 3px solid black !important;  width:100%">
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Class By</th>
                <th>Purpose</th>
                <th>Item</th>
                <th>Date Needed</th>
                
            </tr>

            <?php $__currentLoopData = $all_request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr class='bg-opacity-50'>
        
    
  
            
                <td><?php echo e($request->date); ?></td>
                <td><?php echo e($request->requested_by); ?></td>
                <td><?php echo e($request->class); ?></td>
                <td><?php echo e($request->purpose); ?></td>
                <td><?php echo e($request->item." ".$request->item2); ?></td>
                <td><?php echo e($request->needed); ?></td>
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    
</body>
</html><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/materials/export_request.blade.php ENDPATH**/ ?>