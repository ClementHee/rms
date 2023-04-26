<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'column' => null,
    'theme' => null,
    'multiSort' => false,
    'sortArray' => [],
    'sortField' => null,
    'sortDirection' => null,
    'enabledFilters' => null,
    'actions' => null,
    'dataField' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'column' => null,
    'theme' => null,
    'multiSort' => false,
    'sortArray' => [],
    'sortField' => null,
    'sortDirection' => null,
    'enabledFilters' => null,
    'actions' => null,
    'dataField' => null,
]); ?>
<?php foreach (array_filter(([
    'column' => null,
    'theme' => null,
    'multiSort' => false,
    'sortArray' => [],
    'sortField' => null,
    'sortDirection' => null,
    'enabledFilters' => null,
    'actions' => null,
    'dataField' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $field = filled($column->dataField) ? $column->dataField : $column->field;
?>
<th class="<?php echo e($theme->table->thClass .' '. $column->headerClass); ?>"
    wire:key="<?php echo e(md5($column->field)); ?>"
    <?php if($column->sortable): ?>
    x-data x-multisort-shift-click="<?php echo e($this->id); ?>"
    <?php endif; ?>
    style="<?php echo e($column->hidden === true ? 'display:none': ''); ?>; width: max-content; <?php if($column->sortable): ?> cursor:pointer; <?php endif; ?> <?php echo e($theme->table->thStyle.' '. $column->headerStyle); ?>">
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'pl-[11px]' => !$column->sortable && isTailwind(),
            $theme->cols->divClass
        ]) ?>"
         style="<?php echo e($theme->cols->divStyle); ?>"
        <?php if($column->sortable): ?> wire:click="sortBy('<?php echo e($field); ?>')" <?php endif; ?>>
        <?php if($column->sortable): ?>
            <span>
                <?php if($multiSort && array_key_exists($field,$sortArray)): ?>
                    <?php if($sortArray[$field] == 'desc'): ?>
                        &#8595;
                    <?php else: ?>
                        &#8593;
                    <?php endif; ?>
                <?php elseif($multiSort): ?>
                    &#8597;
                <?php else: ?>
                    <?php if($sortField !== $field): ?>
                        &#8597;
                    <?php elseif($sortDirection == 'desc'): ?>
                        &#8593;
                    <?php else: ?>
                        &#8595;
                    <?php endif; ?>
                <?php endif; ?>
			</span>
        <?php else: ?>
            <span style="width: 6px"></span>
        <?php endif; ?>
        <span><?php echo e($column->title); ?></span>
    </div>
</th>
<?php /**PATH C:\xampp\htdocs\RhemaManagementSystem\resources\views/vendor/livewire-powergrid/components/cols.blade.php ENDPATH**/ ?>