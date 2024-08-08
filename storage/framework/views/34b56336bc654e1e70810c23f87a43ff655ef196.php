<div>
<h1> Siblings List</h1>
    
<button wire:click="exportPDF()" class="btn btn-info">
    Export</button> 
<div class="row">
<?php
$prevItem = null

?>
<?php $__currentLoopData = $siblings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sibling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
  
    <?php if($prevItem!==null): ?>
 
        <?php if((($sibling->father)==($prevItem->father)) ||(($sibling->mother)==($prevItem->mother)) ): ?>
            <tr>
                <td>
                    <?php echo e($sibling->fullname); ?>

                </td>
                <td>
                    <?php if( $sibling->j3_class !=""): ?>
                        <?php echo e($sibling->j3_class); ?>

                    <?php elseif( $sibling->j2_class !=""): ?>
                        <?php echo e($sibling->j2_class); ?>

                    <?php elseif($sibling->j1_class): ?>
                        <?php echo e($sibling->j1_class); ?>

                    <?php else: ?>
                        Not Assigned
                    <?php endif; ?>
                </td>
            </tr>

        <?php else: ?>
        </table></div>
        <br>
        <div class="col-4">
            <table cellspacing="0" cellpadding="0"  border="1" class="table table-bordered" style="table-layout:fixed; border: 3px solid black !important;  width:100%">
            <tr ><td class="col-3"><?php echo e($sibling->fullname); ?></td>
                <td class="col-3">
                    <?php if( $sibling->j3_class !=""): ?>
                        <?php echo e($sibling->j3_class); ?>

                    <?php elseif( $sibling->j2_class !=""): ?>
                        <?php echo e($sibling->j2_class); ?>

                    <?php elseif($sibling->j1_class): ?>
                        <?php echo e($sibling->j1_class); ?>

                    <?php else: ?>
                        Not Assigned
                    <?php endif; ?>
                </td>
        <?php endif; ?>
    <?php else: ?>
        <div class='col-4'>
        <table cellspacing="0" cellpadding="0"  border="1" class="table table-bordered" style="table-layout:fixed; border: 3px solid black !important; width:100%" >
            <tr>
                <td class="col-3" ><?php echo e($sibling->fullname); ?></td>
                <td class="col-3">
                    <?php if( $sibling->j3_class !=""): ?>
                        <?php echo e($sibling->j3_class); ?>

                    <?php elseif( $sibling->j2_class !=""): ?>
                        <?php echo e($sibling->j2_class); ?>

                    <?php elseif($sibling->j1_class): ?>
                        <?php echo e($sibling->j1_class); ?>

                    <?php else: ?>
                        Not Assigned
                    <?php endif; ?>
                </td>
            </tr>

    <?php endif; ?>
 
 <?php
     $prevItem =$sibling
 ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
</div><?php /**PATH C:\xampp\htdocs\rms\resources\views/livewire/siblingslist.blade.php ENDPATH**/ ?>