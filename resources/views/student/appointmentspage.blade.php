<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Available Appointments') }}
        </h2>
    </x-slot>

    <div class="mt-10"></div>
    @csrf

    @if (Session::has('success'))
    <x-success :message="Session::get('success')" />
    @elseif(Session::has('warning'))
    <x-success :message="Session::get('warning')" />
    @endif
    @foreach ($appointments as $appointment)

    <div class="flex justify-center items-center">
        <div class="w-full mx-10 my-2 bg-white shadow-md overflow-hidden rounded-lg hover:bg-red-100 transition-all duration-300 ease-in-out">
            <a href="{{ $patients_confirmed_count[$appointment->appointment_id] <= $appointment->appointment_allowed_patients ? route('availappointments', ['id' => $appointment->appointment_id]) : 'javascript:void(0)' }}" class="block px-10 py-5 {{ $patients_confirmed_count[$appointment->appointment_id] <= $appointment->appointment_allowed_patients ? '' : 'pointer-events-none opacity-50' }}">
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
                            @if ($patients_confirmed_count[$appointment->appointment_id] <= $appointment->appointment_allowed_patients)
                                <div class="text-sm border border-green-300 bg-green-300 w-min p-1 rounded-2xl px-2">
                                    Available
                                </div>
                                @else
                                <div class="text-sm border border-yellow-300 bg-yellow-300 w-max p-1 rounded-2xl px-2">
                                    Already Full
                                </div>
                                @endif
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

    @endforeach
</x-app-layout>