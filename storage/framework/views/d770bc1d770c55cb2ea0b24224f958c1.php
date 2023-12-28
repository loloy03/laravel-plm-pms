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
            <?php echo e(__('View Available Appointments')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="mt-10"></div>
    <?php echo csrf_field(); ?>

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
    <?php elseif(Session::has('warning')): ?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.success','data' => ['message' => Session::get('warning')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(Session::get('warning'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="flex justify-center items-center">
        <div class="w-full mx-10 my-2 bg-white shadow-md overflow-hidden rounded-lg hover:bg-red-100 transition-all duration-300 ease-in-out">
            <a href="<?php echo e(route('availappointments', ['id' => $appointment->appointment_id])); ?>" class="block px-10 py-5">
                <div class="p-3 text-gray-900 ">
                    <div class="md:flex flex-row ">
                        <div class="basis-1/2 flex justify-center items-center text-6xl xs:mb-5 sm:mb-0">
                            <i class=" fa-regular fa-calendar-check"></i>
                        </div>
                        <div class="basis-1/2">
                            <div class="font-bold text-3xl">
                                <?php echo e($appointment->appointment_title); ?>

                            </div>
                            <div class="text-sm mb-4 ">
                                Appointment ID: <?php echo e($appointment->appointment_id); ?>

                            </div>
                        </div>
                        <div class="basis-1/2">
                            <!--changing the time format on the view--->
                            <div class="flex">
                                <div class="font-bold">
                                    Start Date: &nbsp;
                                </div>
                                <div>
                                    <?php echo e(\Carbon\Carbon::parse($appointment->appointment_start_date)->format('F d, Y, h:i A')); ?>

                                </div>

                            </div>
                            <div class="flex">
                                <div class="font-bold">
                                    End Date: &nbsp;
                                </div>
                                <div>
                                    <?php echo e(\Carbon\Carbon::parse($appointment->appointment_end_date)->format('F d, Y, h:i A')); ?>

                                </div>
                            </div>
                            <div class="flex">
                                <div class="font-bold">
                                    Assigned Doctor: &nbsp;
                                </div>
                                <div>
                                    Dr. <?php echo e($appointment->first_name); ?> <?php echo e($appointment->last_name); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\Sophia Queen Lim\Desktop\laravel-plm-pms-main\resources\views/student/appointmentspage.blade.php ENDPATH**/ ?>