
<x-guest-layout>

    <div class="md:flex flex-row items-center md:h-screen">
        <div class="basis-1/2 p-10">
            <div class="text-6xl font-bold text-blue-900 mb-3">
                QUALITY CARE
            </div>
            <div class="font-bold mb-3 text-red-700">
                YOUR HEALTH IS OUR PRIORITY
            </div>
            <div class="mb-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, laborum corrupti ad dicta illum quidem laudantium reiciendis doloribus libero voluptatem. Assumenda, ad recusandae! Aliquid, laboriosam ea non corporis saepe ullam?
            </div>
            <x-primary-button>
                {{ __('Select Appointment') }}
            </x-primary-button>
        </div>
    </div>
    <div class="md:flex flex-row justify-center items-center">
        <div class="basis-1/2 justify-right">
            <img src="{{ asset('images/nurse-pic-1.jpg') }}" alt="nurse-pic-1">
        </div>
        <div class="basis-1/2 p-20">
            <div class="text-2xl font-bold text-blue-900 mb-3">
                Welcome to PLM Clinic
            </div>
            <div class="mb-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente blanditiis officia et laboriosam voluptas, consectetur fuga. Blanditiis harum tempora tempore dolore laboriosam debitis? Error, explicabo quis vel quisquam numquam a?
            </div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente blanditiis officia et laboriosam voluptas, consectetur fuga. Blanditiis harum tempora tempore dolore laboriosam debitis? Error, explicabo quis vel quisquam numquam a?
            </div>
        </div>
    </div>
    <div class="md:flex flex-row justify-center items-center">
        <div class="basis-1/2 p-20">
            <div class="mb-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente blanditiis officia et laboriosam voluptas, consectetur fuga. Blanditiis harum tempora tempore dolore laboriosam debitis? Error, explicabo quis vel quisquam numquam a?
            </div>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente blanditiis officia et laboriosam voluptas, consectetur fuga. Blanditiis harum tempora tempore dolore laboriosam debitis? Error, explicabo quis vel quisquam numquam a?
            </div>
        </div>
        <div class="basis-1/2 p-10">
            <img src="{{ asset('images/nurse-pic-2.jpg') }}" alt="nurse-pic-2">
        </div>
    </div>
    <div class="bg-red-700 md:flex flex-row justify-center items-center text-white">
        <div class="basis-1/4 p-5">
            <div class="mb-1 font-bold">
                Contact Us
            </div>
            <div class="text-sm">
                <p>Landline: +63 (2) 8 643 2500</p>
                <p> +63 (2) 568 7027</p>
                <p> Mobile: +63 (916) 8945 098</p>
            </div>
        </div>
        <div class="basis-1/4 p-5">
            <div class="mb-1 font-bold">Address</div>
            <div class="text-sm">
                <p>General Luna Corver Muralla Street, Instramuros, City of Manila 1000 Metro Manila.</p>
            </div>
        </div>
        <div class="basis-1/2 p-5 flex justify-center items-center">
            <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.215549477035!2d120.97360247413211!3d14.586789985897942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca2336770053%3A0x1b731714778d3506!2sPamantasan%20ng%20Lungsod%20ng%20Maynila!5e0!3m2!1sen!2sph!4v1698922437726!5m2!1sen!2sph" width="500" height="150" style="border:0; border-radius:10px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>

    </div>
    <div class="bg-red-700 p-5 flex justify-center items-center text-white">
        <div>
            ©️ 1987 - 2023 Pamantasan ng Lungsod ng Maynila. All Rights Reserved.
        </div>
    </div>
</x-guest-layout>
