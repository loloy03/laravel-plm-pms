<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="md:flex flex-row items-center md:h-screen">
        <div class="basis-1/2 p-10">
            <div class="text-6xl font-bold text-blue-900 mb-3">
                QUALITY CARE
            </div>
            <div class="font-bold mb-3 text-red-700">
                YOUR HEALTH IS OUR PRIORITY
            </div>
            <div class="mb-3">
                The PLM-University Health Services under the direct supervision of the Vice-President for Administration is in charge of providing health services and emergency treatment for all university constituents.
            </div>
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php echo e(__('Select Appointment')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
    </div>
    <div class="md:flex flex-row justify-center items-center">
        <div class="basis-1/2 justify-right">
            <img src="<?php echo e(asset('images/nurse-pic-1.jpg')); ?>" alt="nurse-pic-1">
        </div>
        <div class="basis-1/2 p-20">
            <div class="text-2xl font-bold text-blue-900 mb-3">
                Welcome to PLM Clinic
            </div>
            <div class="mb-3">
                Our objectives revolve around two key pillars. Firstly, we aim to champion health maintenance by offering fundamental health services encompassing health education, routine physical examinations, screenings, treatments, and ongoing case monitoring.
            </div>
            <div>
                Secondly, we strive to cultivate a culture of high performance among our employees by ensuring access to top-notch healthcare services, fostering a workplace environment centered on quality care and well-being. These objectives form the foundation of our commitment to promoting and supporting health and wellness for all.
            </div>
        </div>
    </div>
    <div class="md:flex flex-row justify-center items-center">
        <div class="basis-1/2 p-20">
            <div class="mb-3">

                The University Health Services encompass several functions divided into Medical and Dental Sections. The Medical Section conducts physical examinations for incoming freshmen and new employees, including evaluations through chest x-rays and blood counts. They handle emergencies, assess the fitness of sick individuals, and provide health information through various means.
            </div>
            <div>
                Additionally, they coordinate with other units for immunization programs and screenings. Meanwhile, the Dental Section conducts dental examinations, various dental procedures, and promotes dental health through informational materials.
            </div>
        </div>
        <div class="basis-1/2 p-10">
            <img src="<?php echo e(asset('images/nurse-pic-2.jpg')); ?>" alt="nurse-pic-2">
        </div>
    </div>
    <div class="bg-red-700 md:flex flex-row justify-center items-center text-white mt-10">
        <div class="basis-1/4 p-5">
            <div class="mb-1 font-bold">
                Contact Us
            </div>
            <div class="text-xs">
                <p>Landline: +63 (2) 8 643 2500</p>
                <p> +63 (2) 568 7027</p>
                <p> Mobile: +63 (916) 8945 098</p>
            </div>
        </div>
        <div class="basis-1/4 p-5">
            <div class="mb-1 font-bold">Address</div>
            <div class="text-xs">
                <p>General Luna Corver Muralla Street, Instramuros, City of Manila 1000 Metro Manila.</p>
            </div>
        </div>
        <div class="basis-1/2 p-5 flex justify-center items-center">
            <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.215549477035!2d120.97360247413211!3d14.586789985897942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca2336770053%3A0x1b731714778d3506!2sPamantasan%20ng%20Lungsod%20ng%20Maynila!5e0!3m2!1sen!2sph!4v1698922437726!5m2!1sen!2sph" width="350" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>

    </div>
    <div class="bg-red-700 p-5 flex justify-center items-center text-white text-sm">
        <div>
            ©️ 1987 - 2023 Pamantasan ng Lungsod ng Maynila. All Rights Reserved.
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH C:\Users\Sophia Queen Lim\Desktop\laravel-plm-pms-main\resources\views/welcome.blade.php ENDPATH**/ ?>