<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'theme' => '',
    'enabledFilters' => [],
    'column' => null,
    'inline' => null,
    'filter' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'theme' => '',
    'enabledFilters' => [],
    'column' => null,
    'inline' => null,
    'filter' => null,
]); ?>
<?php foreach (array_filter(([
    'theme' => '',
    'enabledFilters' => [],
    'column' => null,
    'inline' => null,
    'filter' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <?php
        $field = strval(data_get($filter, 'field'));
        $title = strval(data_get($filter, 'title'));
        $operators = (array) data_get($filter, 'operators', []);
        $placeholder = strval(data_get($filter, 'placeholder'));
        $componentAttributes = (array) data_get($filter, 'attributes', []);
        
        $inputTextOptions = \PowerComponents\LivewirePowerGrid\Filters\FilterInputText::getInputTextOperators();
        $inputTextOptions = count($operators) > 0 ? $operators : $inputTextOptions;
        $showSelectOptions = !(count($inputTextOptions) === 1 && in_array('contains', $inputTextOptions));
        
        $defaultPlaceholder = $column?->placeholder ?: $column?->title;
        $overridePlaceholder = $placeholder ?: $defaultPlaceholder;
        
        unset($filter['placeholder']);
        
        $defaultAttributes = \PowerComponents\LivewirePowerGrid\Filters\FilterInputText::getWireAttributes($field, $title);
        
        $selectClasses = \Illuminate\Support\Arr::toCssClasses(['power_grid', $theme->selectClass, data_get($column, 'headerClass')]);
        $inputClasses = \Illuminate\Support\Arr::toCssClasses(['power_grid', $theme->inputClass]);
        
        $params = array_merge(
            [
                'showSelectOptions' => $showSelectOptions,
                'placeholder' => ($placeholder = $componentAttributes['placeholder'] ?? $overridePlaceholder),
                ...data_get($filter, 'attributes'),
                ...$defaultAttributes,
            ],
            $filter,
        );
    ?>

    <?php if($params['component']): ?>
        <?php unset($params['operators'], $params['attributes']); ?>

        <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $params['component']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => new \Illuminate\View\ComponentAttributeBag($params)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
    <?php else: ?>
        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([$theme->baseClass]) ?>"
            style="<?php echo e($theme->baseStyle); ?>"
        >
            <?php if(!$inline): ?>
                <label class="block text-sm font-medium text-pg-primary-700 dark:text-pg-primary-300">
                    <?php echo e($title); ?>

                </label>
            <?php endif; ?>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'sm:flex w-full' => !$inline && $showSelectOptions,
                'flex flex-col' => $inline && $showSelectOptions,
            ]) ?>">
                <?php if($showSelectOptions): ?>
                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'pl-0 pt-1 w-full sm:pr-3 sm:w-1/2' => !$inline,
                    ]) ?>">
                        <div class="relative">
                            <select
                                class="<?php echo e($selectClasses); ?>"
                                style="<?php echo e(data_get($column, 'headerStyle')); ?>"
                                <?php echo e($defaultAttributes['selectAttributes']); ?>

                            >
                                <?php $__currentLoopData = $inputTextOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        wire:key="input-text-options-<?php echo e($tableName); ?>-<?php echo e($key . '-' . $value); ?>"
                                        value="<?php echo e($value); ?>"
                                    ><?php echo e(trans('livewire-powergrid::datatable.input_text_options.' . $value)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-pg-primary-700">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.down','data' => ['class' => 'w-4 h-4 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 dark:text-gray-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'pl-0 pt-1 w-full sm:w-1/2' => !$inline && $showSelectOptions,
                    'mt-1' => $inline,
                    'pt-1' => !$showSelectOptions,
                ]) ?>">
                    <input
                        wire:key="input-<?php echo e($field); ?>"
                        data-id="<?php echo e($field); ?>"
                        <?php if(isset($enabledFilters[$field]['disabled']) && boolval($enabledFilters[$field]['disabled']) === true): ?> disabled
                            <?php else: ?>
                                <?php echo e($defaultAttributes['inputAttributes']); ?> <?php endif; ?>
                        type="text"
                        class="<?php echo e($inputClasses); ?>"
                        placeholder="<?php echo e($placeholder); ?>"
                    />
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/filters/input-text.blade.php ENDPATH**/ ?>