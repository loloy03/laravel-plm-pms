<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $appointment->appointment_title }} Appointment
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                    <div>
                        Student Accepted : {{ $accepted_requests_count }}
                    </div>
                    @if ($appointment_requests_count > 0)
                    <div class="pt-10 text-yellow-500">
                        Students Pending Requests:
                    </div>
                    @endif
                    @foreach ($appointment_requests as $appointment_request)
                    <div class="p-10 bg-green-100 mt-10">
                        Name: {{$appointment_request->first_name}} {{$appointment_request->last_name}}
                        <div>
                            Appointment Request ID: {{$appointment_request->appointment_request_id}}
                        </div>
                        <div class="text-right">
                            <form action="{{ route('accept-appointment', $appointment_request->appointment_request_id) }}" method="post">
                                @csrf
                                <button><i class="fa-solid fa-check"></i></button>
                            </form>
                            <form action="{{ route('decline-appointment', $appointment_request->appointment_request_id) }}" method="post">
                                @csrf
                                <button><i class="fa-solid fa-x"></i></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>