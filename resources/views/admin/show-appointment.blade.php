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
                    <div class="flex">
                        <div class="basis-3/4">
                            <div class=" flex">
                                <div class="font-bold">Appointment ID: &nbsp;</div>
                                <div>{{ $appointment->appointment_id }}</div>
                            </div>
                        </div>
                        <div class="basis-1/4 flex justify-end items-center">
                            <form action="{{ route('account-show', $appointment->id) }}" method="get">
                                @csrf
                                <button><i class="fa-regular fa-pen-to-square mr-3 text-md hover:text-yellow-500 transition ease-to-ease"></i></button>
                            </form>
                            <form action="{{ route('appointment-delete', $appointment->appointment_id) }}" method="POST">
                                @csrf
                                <button><i class="fa-solid fa-trash text-md text-red-500 hover:text-red-600 transition ease-to-ease"></i></button>
                            </form>
                        </div>
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
                    @if ($confirmed_requests_count > 0)
                    <div class="flex text-green-500">
                        <div class="mr-1">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </div>
                        <div class="font-bold">Confirmed Patients:&nbsp;</div>
                        <div>{{ $confirmed_requests_count }}</div>
                        <button id="toggleButton" class="bg-green-500 text-white rounded-lg hover:bg-green-300 mx-5 px-5 text-sm">View Patients</button>
                        <button id="downloadPDFButton" class="bg-blue-500 text-white rounded-lg hover:bg-blue-300 mx-5 px-5 text-sm">Download Confirmed Patients as PDF</button>
                    </div>
                    @endif
                    @foreach ($confirmed_requests as $accepted_request)
                    <a href="{{ route('show_patient_info', ['id' => $accepted_request->id]) }}">
                        <div class="mt-5 toggle-element hidden ">
                            <div class="p-5 bg-green-50 rounded-lg flex flex-row hover:bg-green-100 transition ease-in-out duration-150">
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
    document.addEventListener('DOMContentLoaded', function() {
        const downloadPDFButton = document.getElementById('downloadPDFButton');

        downloadPDFButton.addEventListener('click', function() {
            window.location.href = "{{ route('download_pdf', ['id' => $appointment->appointment_id]) }}";
        });
    });
</script>