<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View List of Appointments') }}
        </h2>
    </x-slot>


    @foreach ($appointments as $appointment)

    <div class="flex justify-center items-center">
        <div class="w-full m-6 bg-white shadow-md overflow-hidden rounded-lg hover:bg-red-100 transition-all duration-300 ease-in-out">
            <a href="{{ route('show-appointmet', ['id' => $appointment->appointment_id]) }}" class="block py-5">
                <div class="p-6 text-gray-900 ">
                    <div class="md:flex flex-row ">
                        <div class="basis-1/2 flex justify-center items-center text-6xl mb-5">
                            <i class=" fa-regular fa-calendar-check"></i>
                        </div>
                        <div class="basis-1/2">
                            <div class="font-bold text-2xl">
                                Title: {{ $appointment->appointment_title }}
                            </div>
                            <div>
                                Appointment ID: {{ $appointment->appointment_id }}
                            </div>
                        </div>
                        <div class="basis-1/2">
                            <div>
                                Assigned Doctor: Dr. {{ $appointment->first_name }} {{ $appointment->last_name }}
                            </div>
                            <div>
                                Start Date: {{ $appointment->appointment_start_date }}
                            </div>
                            <div>
                                End Date: {{ $appointment->appointment_end_date }}
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    @endforeach
</x-app-layout>