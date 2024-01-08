<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View List of Appointments') }}
        </h2>
    </x-slot>

    <div class="mt-10"></div>


    


    @foreach ($appointments as $appointment)
        @if ($appointment->appointment_assigned_doctor_id == Auth::user()->id)
            <div class="flex justify-center items-center">
                <div class="w-full mx-10 my-2 bg-white shadow-md overflow-hidden rounded-lg hover:bg-red-100 transition-all duration-300 ease-in-out">
                    <a href="{{ route('show-appointments-page', ['id' => $appointment->appointment_id]) }}" class="block px-10 py-5">
                        <div class="p-3 text-gray-900 ">
                            <div class="md:flex flex-row ">
                                <div class="basis-1/2 flex justify-center items-center text-6xl xs:mb-5 sm:mb-0">
                                    <i class=" fa-regular fa-calendar-check"></i>
                                </div>
                                <div class="basis-1/2">
                                    <div class="flex text-sm font-bold text-yellow-500">
                                        <div>
                                            Appointment:&nbsp;
                                        </div>
                                        <div>
                                            {{ $appointment_requests_count[$appointment->appointment_id] }}
                                        </div>
                                    </div>
                                    <div class="font-bold text-3xl">
                                        {{ $appointment->appointment_title }}
                                    </div>
                                    <div class="text-sm mb-4 ">
                                        Appointment ID: {{ $appointment->appointment_id }}
                                    </div>
                                </div>
                                <div class="basis-1/2">
                                    <!--changing the time format on the view--->
                                    <div class="flex">
                                        <div class="font-bold">
                                            Start Date: &nbsp;
                                        </div>
                                        <div>
                                            {{ \Carbon\Carbon::parse($appointment->appointment_start_date)->format('F d, Y, h:i A') }}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="font-bold">
                                            End Date: &nbsp;
                                        </div>
                                        <div>
                                            {{ \Carbon\Carbon::parse($appointment->appointment_end_date)->format('F d, Y, h:i A') }}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="font-bold">
                                            Assigned Doctor: &nbsp;
                                        </div>
                                        <div>
                                            Dr. {{ $appointment->first_name }} {{ $appointment->last_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    @endforeach

</x-app-layout>



