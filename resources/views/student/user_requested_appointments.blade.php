<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Appointments') }}
        </h2>
    </x-slot>

    <div class="mt-10"></div>
    @foreach($userRequestedAppointments as $appointmentRequest)
    @php
            $end_date = \Carbon\Carbon::parse($appointmentRequest->appointment->appointment_end_date);
            $status = $end_date->isPast() ? 'PastDue' : 'Ongoing';
            $statusColorClass = $end_date->isPast() ? 'bg-red-300' : 'bg-green-300';
    @endphp

    <div class="flex justify-center items-center">
        <div class="w-full mx-10 my-2 bg-white shadow-md overflow-hidden rounded-lg hover:bg-red-100 transition-all duration-300 ease-in-out">
        <a href="{{ route('userappointments', ['id' => $appointmentRequest->appointment->appointment_id]) }}" class="block px-10 py-5">    
                <div class="p-3 text-gray-900 ">
                        <div class="md:flex flex-row ">
                            <div class="basis-1/2 flex justify-center items-center text-6xl xs:mb-5 sm:mb-0">
                                <i class=" fa-regular fa-calendar-check"></i>
                            </div>
                            <div class="basis-1/2">
                                <div class="font-bold text-3xl">
                                    {{ $appointmentRequest->appointment->appointment_title }}
                                </div>
                                <div class="text-sm border {{ $statusColorClass }} w-min p-1 rounded-2xl px-2">
                                    {{ $status }}
                                </div>
                            </div>
                            <div class="basis-1/2">
                                <!--changing the time format on the view--->
                                <div class="flex">
                                    <div class="font-bold">
                                        Start Date: &nbsp;
                                    </div>
                                    <div>
                                        {{ \Carbon\Carbon::parse($appointmentRequest->appointment->appointment_start_date)->format('F d, Y, h:i A') }}
                                    </div>

                                </div>
                                <div class="flex">
                                    <div class="font-bold">
                                        End Date: &nbsp;
                                    </div>
                                    <div>
                                        {{ \Carbon\Carbon::parse($appointmentRequest->appointment->appointment_end_date)->format('F d, Y, h:i A') }}
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="font-bold">
                                        Assigned Doctor: &nbsp;
                                    </div>
                                    <div>
                                        {{ $appointmentRequest->appointment->assignedDoctor->first_name }} {{ $appointmentRequest->appointment->assignedDoctor->last_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            </a>       
        </div>
    </div>

    @endforeach
</x-app-layout>