<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Account List')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <?php if(Session::has('success')): ?>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success','data' => ['message' => Session::get('success')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Session::get('success'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php endif; ?>
    <div class="flex text-sm">
        <div class="flex justify-start">
            <form action="<?php echo e(route('accounts-search')); ?>" method="POST" class="mx-5 my-5">
                <?php echo csrf_field(); ?>
                <input type="text" class="form-control rounded-md w-48 h-8 text-sm" name="q" placeholder="Search Names...">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['type' => 'submit','class' => ' mb-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => ' mb-auto']); ?>Search <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </form>
        </div>
        <div class="my-4 flex items-center space-x-4 justify-end">
            <span class="font-bold">Sort By:</span>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="px-4 py-2 rounded-md border border-gray-300 text-gray-600 hover:bg-gray-100 transition duration-300 ease-in-out">
                    Select
                    <svg class="h-4 w-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute z-50 mt-2 bg-white rounded-md border border-gray-300 shadow-md">
                    <a href="<?php echo e(route('account-list', ['sort' => 'admin'])); ?>" class="block px-4 py-2 hover:bg-gray-100">Admin</a>
                    <a href="<?php echo e(route('account-list', ['sort' => 'super-admin'])); ?>" class="block px-4 py-2 hover:bg-gray-100">Super Admin</a>
                    <a href="<?php echo e(route('account-list', ['sort' => 'student'])); ?>" class="block px-4 py-2 hover:bg-gray-100">Student</a>
                    <a href="<?php echo e(route('account-list', ['sort' => 'doctor'])); ?>" class="block px-4 py-2 hover:bg-gray-100">Doctor</a>
                    <a href="<?php echo e(route('account-list')); ?>" class="block px-4 py-2 hover:bg-gray-100">Reset Sorting</a>
                </div>
            </div>
        </div>
    </div>
    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex justify-center items-center ">
        <div class="w-full mx-5 md:mx-10 my-2 bg-white overflow-hidden rounded-sm text-sm flex flex-row p-5 rounded-md rounded-lg">
            <div class="basis-3/4">
                <div class="text-xs flex">
                    <div> Account ID:</div>
                    <div class="ml-1 font-bold"> <?php echo e($account->id); ?></div>
                </div>
                <div class="text-xs">Created Date: <?php echo e($account->created_at->format('F d, Y H:i:s')); ?></div>
                <div class="flex">
                    <div>
                        Name:
                    </div>
                    <div class="ml-1 font-bold">
                        <?php echo e(ucfirst($account->first_name)); ?>

                    </div>
                    <div class="ml-1 font-bold">
                        <?php echo e(ucfirst($account->last_name)); ?>

                    </div>
                </div>
                <div class="flex">
                    <div>User Type:</div>
                    <div class="font-bold ml-1"> <?php echo e(strtoupper($account->user_type)); ?></div>
                </div>
            </div>
            <div class="basis-1/4 flex justify-center items-center">
                <form action="<?php echo e(route('account-show', $account->id)); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <button><i class="fa-regular fa-pen-to-square mr-3 text-md hover:text-yellow-500 transition ease-to-ease"></i></button>
                </form>
                <form action="<?php echo e(route('account-delete', $account->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button><i class="fa-solid fa-trash text-md hover:text-yellow-500 transition ease-to-ease"></i></button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\Sophia Queen Lim\Desktop\laravel-plm-pms-main\resources\views/super-admin/account-list.blade.php ENDPATH**/ ?>