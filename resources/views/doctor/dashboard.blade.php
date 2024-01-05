<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Profile Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Doctor Information Panel -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <!-- Display doctor's information -->
                    <div class="flex items-center">
                        <img src="doctor_profile_image.jpg" alt="Doctor Profile" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h2 class="text-xl font-semibold">
                                {{ __("Dr. ") . auth()->user()->name }}
                            </h2>
                            <!-- You can access other user details like specialty, contact info, etc., using auth()->user() -->
                            <p class="text-gray-600">{{ __("Specialty: Cardiologist") }}</p>
                            <!-- Add more details like contact info, address, etc. -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
