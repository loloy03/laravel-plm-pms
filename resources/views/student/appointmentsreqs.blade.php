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

                    <!-- Add Book Now Button -->
                    <div class="mb-3">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="bookNowBtn">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal for Booking Confirmation -->
    <div id="bookModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-8 rounded">
            <p class="text-lg font-bold mb-4">Do you wish to book an appointment?</p>
            <div class="flex justify-end">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2" id="confirmBookBtn">Yes</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="cancelBookBtn">No</button>
            </div>
        </div>
    </div>

    <!-- Add JavaScript to handle modal interactions -->
    <script>
        var bookModal = document.getElementById('bookModal');
        var bookNowBtn = document.getElementById('bookNowBtn');
        var confirmBookBtn = document.getElementById('confirmBookBtn');
        var cancelBookBtn = document.getElementById('cancelBookBtn');

        bookNowBtn.addEventListener('click', function() {
            console.log('Book Now button clicked');
            bookModal.classList.remove('hidden');
        });

        confirmBookBtn.addEventListener('click', function() {
            console.log('Yes button clicked');

            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/patient/appointments/confirm/{{ $appointment->appointment_id }}';

            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.type = 'hidden';
            csrfTokenInput.name = '_token';
            csrfTokenInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfTokenInput);

            var appointmentIdInput = document.createElement('input');
            appointmentIdInput.type = 'hidden';
            appointmentIdInput.name = 'appointment_id';
            appointmentIdInput.value = '{{ $appointment->appointment_id }}';
            form.appendChild(appointmentIdInput);

            document.body.appendChild(form);
            form.submit();
        });
    </script>
</x-app-layout>
