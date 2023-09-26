<div
    class="flex flex-col"
    <?php if($deferLoading): ?> wire:init="fetchDatasource" <?php endif; ?>
>
    <div
        id="power-grid-table-container"
        class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
    >
        <div
            id="power-grid-table-base"
            class="py-2 align-middle inline-block min-w-full w-full sm:px-6 lg:px-8"
        >

            <?php echo $__env->make($theme->layout->header, [
                'enabledFilters' => $enabledFilters,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(config('livewire-powergrid.filter') === 'outside'): ?>
                <?php
                    $filtersFromColumns = collect($columns)
                        ->filter(fn($column) => filled($column->filters))
                        ->pluck('filters');
                ?>

                <?php if($filtersFromColumns->count() > 0): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.frameworks.tailwind.filter','data' => ['enabledFilters' => $enabledFilters,'tableName' => $tableName,'columns' => $columns,'filtersFromColumns' => $filtersFromColumns,'theme' => $theme]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::frameworks.tailwind.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['enabled-filters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enabledFilters),'tableName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tableName),'columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columns),'filtersFromColumns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filtersFromColumns),'theme' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($theme)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <div
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'overflow-auto' => $readyToLoad,
                    'overflow-hidden' => !$readyToLoad,
                    $theme->table->divClass,
                ]) ?>"
                style="<?php echo e($theme->table->divStyle); ?>"
            >
                <?php echo $__env->make($table, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <?php echo $__env->make($theme->footer->view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH /usr/local/www/rms/resources/views/vendor/livewire-powergrid/components/frameworks/tailwind/table-base.blade.php ENDPATH**/ ?>