<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View List of Appointments') }}
        </h2>
    </x-slot>


    @foreach ($appointments as $appointment)
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('show-appointmet', ['id' => $appointment->appointment_id]) }}" class="block py-5">
                    <div class="p-6 text-gray-900">
                        <div>
                            Appointment ID: {{ $appointment->appointment_id }}
                        </div>
                        <div>
                            Title: {{ $appointment->appointment_title }}
                        </div>
                        <div>
                            Description: {{ $appointment->appointment_description }}
                        </div>
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
                </a>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>