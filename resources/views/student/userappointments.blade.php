<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $appointment->appointment_title }} Appointment
        </h2>
    </x-slot>

    <div class="p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-3 flex">
                        <div class="font-bold">Appointment Title: &nbsp;</div>
                    </div>
                    <div class="text-5xl font-bold mb-3">
                        {{ $appointment->appointment_title }}
                    </div>
                    <div class="mb-3">
                        <div class="font-bold">Description:</div>
                        <div class="sm:w-1/2 xsm:w-100">{{ $appointment->appointment_description }}</div>
                    </div>
                    <div class="mb-3 flex">
                        <div>
                            <i class="fa-solid fa-user-doctor mr-1"></i>
                        </div>
                        <div class="font-bold">
                            Assigned Doctor: &nbsp;
                        </div>
                        <div>Dr. {{ $appointment->assignedDoctor->first_name }} {{ $appointment->assignedDoctor->last_name }}</div>
                    </div>
                    <div class="mb-3 flex">
                        <div class="mr-1">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="font-bold">Start Date:&nbsp;</div>
                        <div> {{ \Carbon\Carbon::parse($appointment->appointment_start_date)->format('F d, Y, h:i A') }}</div>
                    </div>
                    <div class="mb-3 flex">
                        <div class="mr-1">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="font-bold">End Date:&nbsp;</div>
                        <div>{{ \Carbon\Carbon::parse($appointment->appointment_end_date)->format('F d, Y, h:i A') }}</div>
                    </div>
                    
                    <div class="mb-3">
                    @if($specificAppointmentRequest)
                        Remarks: {{ $specificAppointmentRequest->remarks }}
                    @else
                        No remarks found for this appointment request.
                    @endif
                    </div>

                    @if ($specificAppointmentRequest->attachment)
                    <form method="get" action="{{ route('view-attachment', ['filename' => $specificAppointmentRequest->attachment]) }}" target="_blank">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Doctor Attachment</button>
                    </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
