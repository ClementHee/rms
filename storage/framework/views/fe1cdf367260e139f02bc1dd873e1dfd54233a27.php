<?php if(count($enabledFilters)): ?>
    <div class="flex items-center gap-2 mt-2 md:mt-0 flex-wrap">
        <?php if(count($enabledFilters) > 1): ?>
            <span
                class="outline-none inline-flex justify-center items-center group rounded gap-x-1 text-xs font-semibold px-2.5 py-0.5 text-pg-primary-100 bg-pg-primary-500 dark:bg-pg-primary-700"
            >
                <?php echo e(trans('livewire-powergrid::datatable.buttons.clear_all_filters')); ?>

                <div class="relative flex items-center w-2 h-2">
                    <button
                        wire:click.prevent="clearAllFilters"
                        type="button"
                    >
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.x','data' => ['class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </button>
                </div>
            </span>
        <?php endif; ?>
        <?php $__currentLoopData = $enabledFilters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($filter['label'])): ?>
                <span
                    wire:key="enabled-filters-<?php echo e($field); ?>"
                    class="outline-none inline-flex justify-center items-center group rounded gap-x-1 text-xs font-semibold px-2.5 py-0.5 text-pg-primary-600 bg-pg-primary-100 dark:bg-pg-primary-600"
                >
                    <?php echo e($filter['label']); ?>

                    <div class="relative flex items-center w-2 h-2">
                        <button
                            wire:click.prevent="clearFilter('<?php echo e($field); ?>')"
                            type="button"
                        >
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.x','data' => ['class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </button>
                    </div>
                </span>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/header/enabled-filters.blade.php ENDPATH**/ ?>