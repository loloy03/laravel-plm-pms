<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Medical History') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center mt-8">
    <form method="POST" action="{{ route('medicalhistoryadd') }}">
            @csrf

            @if (Session::has('success'))
                <x-success :message="Session::get('success')" />
            @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 w-full max-w-screen-xl mx-auto px-10 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg relative">
        <!-- First Column -->
        <div>
            <!-- First Name -->
            <div class="mt-4">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="f_name" class="block mt-1 w-full" type="text" name="first_name" :value="$hasMedicalHistory ? $existingMedicalHistory->first_name : old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$hasMedicalHistory ? $existingMedicalHistory->last_name : old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option disabled>Select Gender</option>
                <option value="male" {{ $hasMedicalHistory && $existingMedicalHistory->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $hasMedicalHistory && $existingMedicalHistory->gender === 'female' ? 'selected' : '' }}>Female</option>
                <!-- Add more options if needed -->
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="$hasMedicalHistory ? $existingMedicalHistory->birthdate : old('birthdate')" required autocomplete="birthdate" />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

            <!-- 'ards' Field -->
            <div class="mt-4">
                <x-input-label for="ards" :value="__('Do you have Acquired Respiratory Distress Syndrome?')" />
                <x-text-input id="ards" class="block mt-1 w-full" type="text" name="ards" :value="$hasMedicalHistory ? $existingMedicalHistory->ards : old('ards')" required autocomplete="ards" />
                <x-input-error :messages="$errors->get('ards')" class="mt-2" />
            </div>

            <!-- 'anxpan' Field -->
            <div class="mt-4">
                <x-input-label for="anxpan" :value="__('Do you have Anxiety/ Panic Attack?')" />
                <x-text-input id="anxpan" class="block mt-1 w-full" type="text" name="anxpan" :value="$hasMedicalHistory ? $existingMedicalHistory->anxpan : old('anxpan')" required autocomplete="anxpan" />
                <x-input-error :messages="$errors->get('anxpan')" class="mt-2" />
            </div>

            <!-- 'arthritis' Field -->
            <div class="mt-4">
                <x-input-label for="arthritis" :value="__('Do you have Arthritis?')" />
                <x-text-input id="arthritis" class="block mt-1 w-full" type="text" name="arthritis" :value="$hasMedicalHistory ? $existingMedicalHistory->arthritis : old('arthritis')" required autocomplete="arthritis" />
                <x-input-error :messages="$errors->get('arthritis')" class="mt-2" />
            </div>
        </div>

        <!-- Second Column -->
        <div>
            <!-- 'asthma' Field -->
            <div class="mt-4">
                <x-input-label for="asthma" :value="__('Do you have Asthma?')" />
                <x-text-input id="asthma" class="block mt-1 w-full" type="text" name="asthma" :value="$hasMedicalHistory ? $existingMedicalHistory->asthma : old('asthma')" required autocomplete="asthma" />
                <x-input-error :messages="$errors->get('asthma')" class="mt-2" />
            </div>

            <!-- 'depress' Field -->
            <div class="mt-4">
                <x-input-label for="depress" :value="__('Do you experience having Depression?')" />
                <x-text-input id="depress" class="block mt-1 w-full" type="text" name="depress" :value="$hasMedicalHistory ? $existingMedicalHistory->depress : old('depress')" required autocomplete="depress" />
                <x-input-error :messages="$errors->get('depress')" class="mt-2" />
            </div>

            <!-- 'diabetes' Field -->
            <div class="mt-4">
                <x-input-label for="diabetes" :value="__('Do you have Diabetes?')" />
                <x-text-input id="diabetes" class="block mt-1 w-full" type="text" name="diabetes" :value="$hasMedicalHistory ? $existingMedicalHistory->diabetes : old('diabetes')" required autocomplete="diabetes" />
                <x-input-error :messages="$errors->get('diabetes')" class="mt-2" />
            </div>

            <!-- 'heartatk' Field -->
            <div class="mt-4">
                <x-input-label for="heartatk" :value="__('Do you experience having a Heart Attack')" />
                <x-text-input id="heartatk" class="block mt-1 w-full" type="text" name="heartatk" :value="$hasMedicalHistory ? $existingMedicalHistory->heartatk : old('heartatk')" required autocomplete="heartatk" />
                <x-input-error :messages="$errors->get('heartatk')" class="mt-2" />
            </div>

            <!-- 'stroke' Field -->
            <div class="mt-4">
                <x-input-label for="stroke" :value="__('Do you experience having a Stroke?')" />
                <x-text-input id="stroke" class="block mt-1 w-full" type="text" name="stroke" :value="$hasMedicalHistory ? $existingMedicalHistory->stroke : old('stroke')" required autocomplete="stroke" />
                <x-input-error :messages="$errors->get('stroke')" class="mt-2" />
            </div>

            <!-- 'visualimp' Field -->
            <div class="mt-4">
                <x-input-label for="visualimp" :value="__('Do you have Visual Impairment?')" />
                <x-text-input id="visualimp" class="block mt-1 w-full" type="text" name="visualimp" :value="$hasMedicalHistory ? $existingMedicalHistory->visualimp : old('visualimp')" required autocomplete="visualimp" />
                <x-input-error :messages="$errors->get('visualimp')" class="mt-2" />
            </div>

            <!-- 'allergies' Field -->
            <div class="mt-4">
                <x-input-label for="allergies" :value="__('Do you have Allergies? If yes, please specify')" />
                <x-text-input id="allergies" class="block mt-1 w-full" type="text" name="allergies" :value="$hasMedicalHistory ? $existingMedicalHistory->allergies : old('allergies')" required autocomplete="allergies" />
                <x-input-error :messages="$errors->get('allergies')" class="mt-2" />
            </div>
        </div>

        <!-- Third Column -->
        <div>
            <!-- 'epilepsy' Field -->
            <div class="mt-4">
                <x-input-label for="epilepsy" :value="__('Do you experience having Epilepsy?')" />
                <x-text-input id="epilepsy" class="block mt-1 w-full" type="text" name="epilepsy" :value="$hasMedicalHistory ? $existingMedicalHistory->epilepsy : old('epilepsy')" required autocomplete="epilepsy" />
                <x-input-error :messages="$errors->get('epilepsy')" class="mt-2" />
            </div>

            <!-- 'hepatitis' Field -->
            <div class="mt-4">
                <x-input-label for="hepatitis" :value="__('Do you have Hepatitis? If yes, what type?')" />
                <x-text-input id="hepatitis" class="block mt-1 w-full" type="text" name="hepatitis" :value="$hasMedicalHistory ? $existingMedicalHistory->hepatitis : old('hepatitis')" required autocomplete="hepatitis" />
                <x-input-error :messages="$errors->get('hepatitis')" class="mt-2" />
            </div>

            <!-- 'metalimp' Field -->
            <div class="mt-4">
                <x-input-label for="metalimp" :value="__('Do you have Metal Implant?')" />
                <x-text-input id="metalimp" class="block mt-1 w-full" type="text" name="metalimp" :value="$hasMedicalHistory ? $existingMedicalHistory->metalimp : old('metalimp')" required autocomplete="metalimp" />
                <x-input-error :messages="$errors->get('metalimp')" class="mt-2" />
            </div>

            <!-- 'tuberculosis' Field -->
            <div class="mt-4">
                <x-input-label for="tuberculosis" :value="__('Do you have Tuberculosis?')" />
                <x-text-input id="tuberculosis" class="block mt-1 w-full" type="text" name="tuberculosis" :value="$hasMedicalHistory ? $existingMedicalHistory->tuberculosis : old('tuberculosis')" required autocomplete="tuberculosis" />
                <x-input-error :messages="$errors->get('tuberculosis')" class="mt-2" />
            </div>

            <!-- 'sexdys' Field -->
            <div class="mt-4">
                <x-input-label for="sexdys" :value="__('Do you experience having Sexual Dysfunction?')" />
                <x-text-input id="sexdys" class="block mt-1 w-full" type="text" name="sexdys" :value="$hasMedicalHistory ? $existingMedicalHistory->sexdys : old('sexdys')" required autocomplete="sexdys" />
                <x-input-error :messages="$errors->get('sexdys')" class="mt-2" />
            </div>

            <!-- 'pregnancy' Field -->
            <div class="mt-4">
                <x-input-label for="pregnancy" :value="__('Do you experience having Pregnancy?')" />
                <x-text-input id="pregnancy" class="block mt-1 w-full" type="text" name="pregnancy" :value="$hasMedicalHistory ? $existingMedicalHistory->pregnancy : old('pregnancy')" required autocomplete="pregnancy" />
                <x-input-error :messages="$errors->get('pregnancy')" class="mt-2" />
            </div>

            <!-- 'others' Field -->
            <div class="mt-4">
                <x-input-label for="others" :value="__('Other Health Information (if there are other health information)')" />
                <x-text-input id="others" class="block mt-1 w-full" type="text" name="others" :value="$hasMedicalHistory ? $existingMedicalHistory->others : old('others')" required autocomplete="others" />
                <x-input-error :messages="$errors->get('others')" class="mt-2" />
            </div>
        </div>

            <!-- 'remarks' Field -->
            <div class="mt-4 col-span-3">
                <x-input-label for="remarks" :value="__('Doctors Remarks')" />
                <x-text-input id="remarks" class="block mt-1 w-full" type="text" name="remarks" :value="$hasMedicalHistory ? $existingMedicalHistory->remarks : old('remarks')" autocomplete="remarks" readonly />
                <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
            </div>

            <div class="mt-4 col-span-3 flex justify-center">
            @if($hasMedicalHistory)
                <!-- Update Medical History Button -->
                <x-primary-button>
                    {{ __('Update Medical History') }}
                </x-primary-button>
                <!-- This button can redirect to a route for updating medical history -->
            @endif

            @if(!$hasMedicalHistory)
                <!-- Add New Record Button -->
                <x-primary-button>
                    {{ __('Submit Form') }}
                </x-primary-button>
            @endif
        </div>
    </div>
    </div>
</form>
</div>

</x-app-layout>