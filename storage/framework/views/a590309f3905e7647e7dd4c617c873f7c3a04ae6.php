<div
    x-data="{ open: false }"
    @click.outside="open = false"
>
    <button
        @click.prevent="open = ! open"
        class="pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-500 dark:hover:bg-pg-primary-700
    dark:ring-offset-pg-primary-800 dark:text-pg-primary-400 dark:bg-pg-primary-600"
    >
        <div class="flex">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.download','data' => ['class' => 'h-5 w-5 text-pg-primary-500 dark:text-pg-primary-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.download'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 text-pg-primary-500 dark:text-pg-primary-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    </button>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transform duration-200"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transform duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="mt-2 w-auto bg-white shadow-xl absolute z-10 dark:bg-pg-primary-600"
    >

        <?php if(in_array('xlsx', data_get($setUp, 'exportable.type'))): ?>
            <div class="flex px-4 py-2 text-pg-primary-400 dark:text-pg-primary-300">
                <span class="w-12"><?php echo app('translator')->get('XLSX'); ?></span>
                <a
                    x-on:click="$wire.call('exportToXLS'); open = false"
                    href="#"
                    class="px-2 block text-pg-primary-800 hover:bg-pg-primary-50 hover:text-black-300 dark:text-pg-primary-200 dark:hover:bg-pg-primary-700 rounded"
                >
                    <?php echo app('translator')->get('livewire-powergrid::datatable.labels.all'); ?>
                </a>
                <?php if($checkbox): ?>
                    <a
                        x-on:click="$wire.call('exportToXLS', true); open = false"
                        href="#"
                        class="px-2 block text-pg-primary-800 hover:bg-pg-primary-50 hover:text-black-300 dark:text-pg-primary-200 dark:hover:bg-pg-primary-700 rounded"
                    >
                        <?php echo app('translator')->get('livewire-powergrid::datatable.labels.selected'); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if(in_array('csv', data_get($setUp, 'exportable.type'))): ?>
            <div class="flex px-4 py-2 text-pg-primary-400 dark:text-pg-primary-300">
                <span class="w-12"><?php echo app('translator')->get('Csv'); ?></span>
                <a
                    x-on:click="$wire.call('exportToCsv'); open = false"
                    href="#"
                    class="px-2 block text-pg-primary-800 hover:bg-pg-primary-50 hover:text-black-300 dark:text-pg-primary-200 dark:hover:bg-pg-primary-700 rounded"
                >
                    <?php echo app('translator')->get('livewire-powergrid::datatable.labels.all'); ?>
                </a>
                <?php if($checkbox): ?>
                    <a
                        x-on:click="$wire.call('exportToCsv', true); open = false"
                        href="#"
                        class="px-2 block text-pg-primary-800 hover:bg-pg-primary-50 hover:text-black-300 dark:text-pg-primary-200 dark:hover:bg-pg-primary-700 rounded"
                    >
                        <?php echo app('translator')->get('livewire-powergrid::datatable.labels.selected'); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\rms\resources\views/vendor/livewire-powergrid/components/frameworks/tailwind/header/export.blade.php ENDPATH**/ ?>