<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$patient_info->first_name}} {{$patient_info->last_name}}'s Medical History
        </h2>
    </x-slot>
    <div class="flex justify-center items-center">
        <div class="w-full m-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if (Session::has('success'))
            <x-success :message="Session::get('success')" />
            @endif
            <div class="md:flex flex-row">
                <!-- First Column -->
                <div class="basis-1/2 m-5">
                    <!-- First Name -->

                    <div class="mt-4">
                        <x-input-label :value="__('First Name')" />
                        <x-text-input id="f_name" class="block mt-1 w-full" :value="$patient_info->first_name" disabled />
                    </div>

                    <!-- Last Name -->
                    <div class="mt-4">
                        <x-input-label :value="__('Last Name')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->last_name" disabled />
                    </div>

                    <!-- Gender -->
                    <div class="mt-4">
                        <x-input-label :value="__('Gender')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->gender" disabled />

                    </div>

                    <!-- Birthdate -->
                    <div class="mt-4">
                        <x-input-label :value="__('Birthdate')" />
                        <x-text-input class="block mt-1 w-full" :value="\Carbon\Carbon::parse($patient_info->birthdate)->format('F d, Y, h:i A')" disabled />
                    </div>

                    <!-- 'ards' Field -->
                    <div class="mt-4">
                        <x-input-label :value="__('Do you have Acquired Respiratory Distress Syndrome?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->ards" disabled />
                    </div>

                    <!-- 'anxpan' Field -->
                    <div class="mt-4">
                        <x-input-label :value="__('Do you have Anxiety/ Panic Attack?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->anxpan" disabled />
                    </div>

                    <!-- 'arthritis' Field -->
                    <div class="mt-4">
                        <x-input-label for="arthritis" :value="__('Do you have Arthritis?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->arthritis" disabled />
                    </div>
                </div>

                <!-- Second Column -->
                <div class="basis-1/2 m-5">
                    <!-- 'asthma' Field -->
                    <div class="mt-4">
                        <x-input-label for="asthma" :value="__('Do you have Asthma?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->asthma" disabled />
                    </div>

                    <!-- 'depress' Field -->
                    <div class="mt-4">
                        <x-input-label for="depress" :value="__('Do you experience having Depression?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->depress" disabled />
                    </div>

                    <!-- 'diabetes' Field -->
                    <div class="mt-4">
                        <x-input-label for="diabetes" :value="__('Do you have Diabetes?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->diabetes" disabled />
                    </div>

                    <!-- 'heartatk' Field -->
                    <div class="mt-4">
                        <x-input-label for="heartatk" :value="__('Do you experience having a Heart Attack')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->heartatk" disabled />
                    </div>

                    <!-- 'stroke' Field -->
                    <div class="mt-4">
                        <x-input-label for="stroke" :value="__('Do you experience having a Stroke?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->stroke" disabled />
                    </div>

                    <!-- 'visualimp' Field -->
                    <div class="mt-4">
                        <x-input-label for="visualimp" :value="__('Do you have Visual Impairment?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->visualimp" disabled />
                    </div>

                    <!-- 'allergies' Field -->
                    <div class="mt-4">
                        <x-input-label for="allergies" :value="__('Do you have Allergies? If yes, please specify')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->allergies" disabled />
                    </div>
                </div>


                <!-- Third Column -->
                <div class="basis-1/2 m-5">
                    <!-- 'epilepsy' Field -->
                    <div class="mt-4">
                        <x-input-label for="epilepsy" :value="__('Do you experience having Epilepsy?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->epilepsy" disabled />
                    </div>

                    <!-- 'hepatitis' Field -->
                    <div class="mt-4">
                        <x-input-label for="hepatitis" :value="__('Do you have Hepatitis? If yes, what type?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->hepatitis" disabled />
                    </div>

                    <!-- 'metalimp' Field -->
                    <div class="mt-4">
                        <x-input-label for="metalimp" :value="__('Do you have Metal Implant?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->metalimp" disabled />
                    </div>

                    <!-- 'tuberculosis' Field -->
                    <div class="mt-4">
                        <x-input-label for="tuberculosis" :value="__('Do you have Tuberculosis?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->tuberculosis" disabled />
                    </div>

                    <!-- 'sexdys' Field -->
                    <div class="mt-4">
                        <x-input-label for="sexdys" :value="__('Do you experience having Sexual Dysfunction?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->sexdys" disabled />
                    </div>

                    <!-- 'pregnancy' Field -->
                    <div class="mt-4">
                        <x-input-label for="pregnancy" :value="__('Do you experience having Pregnancy?')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->pregnancy" disabled />
                    </div>

                    <!-- 'others' Field -->
                    <div class="mt-4">
                        <x-input-label for="others" :value="__('Other Health Information (if there are other health information)')" />
                        <x-text-input class="block mt-1 w-full" :value="$patient_info->others" disabled />
                    </div>
                </div>
                <!-- 'remarks' Field -->
            </div>
            <div class="m-4">
    <form action="{{ route('edit-remarks', ['id' => $patient_remarks->appointment_request_id]) }}" method="post" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Doctor's Remarks -->
        <div class="mt-4">
            <x-input-label for="remarks" :value="__('Doctor\'s Remarks')" />
            <x-text-input class="block mt-1 w-full" :value="$patient_remarks->remarks" id="remarks" name="remarks" />
        </div>
   <!-- File Upload -->
   <div class="mt-4">
    <x-input-label for="attachment" :value="__('Upload Attachment (PDF)')" />
    <input type="file" id="attachment" name="attachment" class="block mt-1 w-full" accept=".pdf" />
    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
</div>


        <!-- Appointment Status Dropdown -->
        <div class="mt-4">
    <x-input-label for="appstatus" :value="__('Appointment Status')" />
    <select id="appstatus" name="appstatus" class="block mt-1 w-full" required autocomplete="appstatus">
    <option value="">Choose Status</option>
        <option value="complete" @if(optional($appstatus)->appstatus === 'complete') selected @endif>Completed</option>
        <option value="incomplete" @if(optional($appstatus)->appstatus === 'incomplete') selected @endif>Incomplete</option>
    
    </select>
    <x-input-error :messages="$errors->get('appstatus')" class="mt-2" />
</div>







        <div class="flex items-center justify-center my-4">
            <x-primary-button class="ml-4">
                {{ __('Edit Remarks') }}
            </x-primary-button>
        </div>
    </form>
</div>


        </div>
</x-app-layout>