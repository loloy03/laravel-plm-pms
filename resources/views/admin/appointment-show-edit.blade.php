<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>
    <div class="flex justify-center items-center">
        <div class="w-full m-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if (Session::has('success'))
            <x-success :message="Session::get('success')" />
            @endif
            <form method="POST" action="{{ route('edit-appointment', ['id' => $appointment->appointment_id])}}">
                @csrf
                <div class="md:flex flex-row">

                    <div class="basis-1/2 m-5">
                        
                        <!-- Appointment Title -->
                        <div class="mt-4">
                            <x-input-label for="appointment_title" :value="__('Appointment Title')" />
                            <x-text-input id="appointment_title" class="block mt-1 w-full" type="text" name="appointment_title" autofocus value="{{ $appointment->appointment_title }}" />
                            <x-input-error :messages="$errors->get('appointment_title')" class="mt-2" />
                        </div>

                        <!-- Appointment Description -->
                        <div class="mt-4">
                            <x-input-label for="appointment_description" :value="__('Appointment Description')" />
                            <x-text-input id="appointment_description" class="block mt-1 w-full h-20" type="text" name="appointment_description" autofocus value="{{ $appointment->appointment_description }}" />
                            <x-input-error :messages="$errors->get('appointment_description')" class="mt-2" />
                        </div>

                        <!-- Appointment Assigned Doctor -->
                        <div class="mt-4">
                            <x-input-label for="appointment_assigned_doctor_id" :value="__('Appointment Assigned Doctor')" />
                            <select name="appointment_assigned_doctor_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="{{ $assigned_doctor->id }}" selected>Dr. {{ $assigned_doctor->first_name }} {{ $assigned_doctor->last_name }}</option>
                                @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}"> Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('appointment_assigned_doctor_id')" class="mt-2" />
                        </div>
                    </div>

                    <div class="basis-1/2 m-5">

                        <!-- Appointment Start Date -->
                        <div class="mt-4">
                            <x-input-label for="appointment_start_date" :value="__('Appointment Start Date')" />
                            <x-text-input id="appointment_start_date" class="block mt-1 w-full" type="datetime-local" name="appointment_start_date" value="{{ $appointment->appointment_start_date }}" autofocus />
                            <x-input-error :messages="$errors->get('appointment_start_date')" class="mt-2" />
                        </div>

                        <!-- Appointment End Date -->
                        <div class="mt-4">
                            <x-input-label for="appointment_end_date" :value="__('Appointment End Date')" />
                            <x-text-input id="appointment_end_date" class="block mt-1 w-full" type="datetime-local" name="appointment_end_date" autofocus value="{{ $appointment->appointment_end_date }}" />
                            <x-input-error :messages="$errors->get('appointment_end_date')" class="mt-2" />
                        </div>

                        <!-- Appointment Allowed Patients -->
                        <div class="mt-4">
                            <x-input-label for="appointment_allowed_patients" :value="__('Allowed Patients')" />
                            <x-text-input id="appointment_allowed_patients" class="block mt-1 w-full" type="number" name="appointment_allowed_patients" autofocus value="{{ $appointment->appointment_allowed_patients }}" />
                            <x-input-error :messages="$errors->get('appointment_allowed_patients')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center my-4">
                    <x-primary-button class="ml-4">
                        {{ __('Edit Appointment') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>