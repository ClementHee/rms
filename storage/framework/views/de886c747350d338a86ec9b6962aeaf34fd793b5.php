<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'theme' => '',
    'inline' => null,
    'date' => null,
    'column' => null,
    'tableName' => null,
    'type' => 'datetime',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'theme' => '',
    'inline' => null,
    'date' => null,
    'column' => null,
    'tableName' => null,
    'type' => 'datetime',
]); ?>
<?php foreach (array_filter(([
    'theme' => '',
    'inline' => null,
    'date' => null,
    'column' => null,
    'tableName' => null,
    'type' => 'datetime',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    unset($filter['className']);
    extract($filter);
    
    $customConfig = [];
    if ($params) {
        foreach ($params as $key => $value) {
            $customConfig[$key] = $value;
        }
    }
    
    $params = [
        'type' => $type,
        'dataField' => $field,
        'tableName' => $tableName,
        'filterKey' => 'enabledFilters.datetime.' . $field,
        'label' => $title,
        'locale' => config('livewire-powergrid.plugins.flatpickr.locales.' . app()->getLocale()),
        'onlyFuture' => data_get($customConfig, 'only_future', false),
        'noWeekEnds' => data_get($customConfig, 'no_weekends', false),
        'customConfig' => $customConfig,
    ];
?>
<div
    wire:ignore
    x-data="pgFlatpickr(<?php echo \Illuminate\Support\Js::from($params)->toHtml() ?>)"
>
    <div
        class="<?php echo e($theme->baseClass); ?>"
        style="<?php echo e($theme->baseStyle); ?>"
    >
        <?php if(!$inline): ?>
            <label class="block text-sm font-medium text-pg-primary-700 dark:text-pg-primary-300">
                <?php echo e($title); ?>

            </label>
        <?php endif; ?>
        <form autocomplete="off">
            <input
                id="input_<?php echo e($column); ?>"
                x-ref="rangeInput"
                autocomplete="off"
                data-field="<?php echo e($field); ?>"
                style="<?php echo e($theme->inputStyle); ?> <?php echo e(data_get($column, 'headerStyle')); ?>"
                class="power_grid <?php echo e($theme->inputClass); ?> <?php echo e(data_get($column, 'headerClass')); ?>"
                type="text"
                readonly
                placeholder="<?php echo e(trans('livewire-powergrid::datatable.placeholders.select')); ?>"
            >
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/filters/date-picker.blade.php ENDPATH**/ ?>