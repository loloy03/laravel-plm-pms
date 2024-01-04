<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucfirst($filter) }} Appointments
        </h2>
    </x-slot>

    <div class="mt-10"></div>




    <div class="my-10 flex justify-center text-sm">
        <form method="GET" action="{{ route('filter-appointments') }}">
            <input type="hidden" name="filter" value="ongoing">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2">
                Ongoing Appointments
            </button>
        </form>
        <form method="GET" action="{{ route('filter-appointments') }}">
            <input type="hidden" name="filter" value="available">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-2">
                Available Appointments
            </button>
        </form>

        <form method="GET" action="{{ route('filter-appointments') }}">
            <input type="hidden" name="filter" value="past">
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">
                Past Appointments
            </button>
        </form>
    </div>





    @foreach ($appointments as $appointment)

    <div class="flex justify-center items-center">
        <div class="w-full mx-10 my-2 bg-white shadow-md overflow-hidden rounded-lg hover:bg-red-100 transition-all duration-300 ease-in-out">
            <a href="{{ route('show-appointmet', ['id' => $appointment->appointment_id]) }}" class="block px-10 py-5">
                <div class="p-3 text-gray-900 ">
                    <div class="md:flex flex-row ">
                        <div class="basis-1/2 flex justify-center items-center text-6xl xs:mb-5 sm:mb-0">
                            <i class=" fa-regular fa-calendar-check"></i>
                        </div>
                        <div class="basis-1/2">
                            <div class="flex text-sm font-bold text-yellow-500">
                                <div>
                                    Slots Filled: {{ $patients_confirmed_count[$appointment->appointment_id] }} out of {{ $appointment->appointment_allowed_patients }}
                                </div>
                            </div>
                            <div class="font-bold text-3xl">
                                {{ $appointment->appointment_title }}
                            </div>
                            <div class="text-sm mb-4 ">
                                Appointment ID: {{ $appointment->appointment_id }}
                            </div>
                        </div>
                        <div class="basis-1/2 text-sm md:text-base">
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

    @endforeach
</x-app-layout>