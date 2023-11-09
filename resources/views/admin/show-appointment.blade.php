<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $appointment->appointment_title }} Appointment
        </h2>
    </x-slot>

    <div class="p-5 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-3 flex">
                        <div class="font-bold">Appointment ID: &nbsp;</div>
                        <div>{{ $appointment->appointment_id }}</div>
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
                        <div>Dr. {{ $appointment->first_name }} {{ $appointment->last_name }}</div>
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
                    @if ($accepted_requests_count > 0)
                    <div class="flex text-green-500">
                        <div class="mr-1">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="font-bold">Accepted Students:&nbsp;</div>
                        <div>{{ $accepted_requests_count }}</div>
                        <button id="toggleButton" class="bg-green-500 text-white rounded-lg hover:bg-green-300 mx-5 px-5 text-sm">View Students</button>
                    </div>
                    @endif
                    @foreach ($accepted_requests as $accepted_request)
                    <div class="mt-5 toggle-element hidden">
                        <div class="p-5 bg-green-50 rounded-lg flex flex-row">
                            <div class="basis-1/4 flex justify-center items-center text-xl">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="basis-3/4">
                                <div class="text-sm">
                                    Name: {{$accepted_request->first_name}} {{$accepted_request->last_name}}
                                </div>
                                <div class="text-sm">
                                    Appointment Request ID: {{$accepted_request->appointment_request_id}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if ($appointment_requests_count > 0)
                    <div class="mt-5 text-yellow-500 font-bold">
                        <i class="fa-solid fa-spinner"></i>
                        Students Pending Requests:
                    </div>
                    @endif
                    @foreach ($appointment_requests as $appointment_request)
                    <a href="{{ route('show_user_info', ['id' => $appointment_request->id]) }}">
                        <div class="mt-5">
                            <div class="p-5 bg-yellow-50 hover:bg-yellow-100 transition ease-in-out duration-150 rounded-lg flex flex-row">
                                <div class="basis-1/4 flex justify-center items-center text-xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="basis-1/2">
                                    <div class="text-sm">
                                        Name: {{$appointment_request->first_name}} {{$appointment_request->last_name}}
                                    </div>
                                    <div class="text-sm">
                                        Appointment Request ID: {{$appointment_request->appointment_request_id}}
                                    </div>
                                </div>
                                <div class="basis-1/4 flex justify-end items-center ">
                                    <form action="{{ route('accept-appointment', $appointment_request->appointment_request_id) }}" method="post">
                                        @csrf
                                        <button class="bg-green-500 p-2 mx-2 hover:text-white"><i class="fa-solid fa-check"></i></button>
                                    </form>
                                    <form action="{{ route('decline-appointment', $appointment_request->appointment_request_id) }}" method="post">
                                        @csrf
                                        <button class="bg-red-500 p-2 hover:text-white"><i class="fa-solid fa-x"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggleButton');
        const elementsToToggle = document.querySelectorAll('.toggle-element');

        toggleButton.addEventListener('click', function() {
            elementsToToggle.forEach(function(element) {
                element.classList.toggle('hidden');
            });
        });
    });
</script>