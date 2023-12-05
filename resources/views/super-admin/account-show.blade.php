<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Patient Information
        </h2>
    </x-slot>
    <div class="m-6 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <form action="{{ route('account-edit', $account->id) }}" method="post">
            @csrf

            @if (Session::has('success'))
            <x-success :message="Session::get('success')" />
            @endif


            <div class="md:flex flex-row">

                <div class="basis-1/2 md:p-10 p-5">

                    <!-- For Id -->
                    <div class="mt-4">
                        <x-input-label :value="__('Patient ID')" />
                        <x-text-input type="text" class="block mt-1 w-full bg-gray-100" value="{{ $account->id }}" disabled />
                    </div>

                    <!-- For first name -->
                    <div class="mt-4">
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$account->first_name" autofocus />

                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- For last name-->
                    <div class="mt-4">
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$account->last_name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                </div>

                <div class="basis-1/2 md:p-10 px-5">

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label :value="__('Email')" />
                        <x-text-input type="text" class="block mt-1 w-full bg-gray-100" value="{{ $account->email }}" disabled />
                    </div>

                    <!-- Create Account as -->
                    <div class="mt-4">
                        <x-input-label for="user_type" :value="__('Update account as')" />
                        <select name="user_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option class="mt-2" disabled selected>{{ucfirst($account->user_type)}}</option>
                            @if($account->user_type == 'super-admin')
                            <option class="mt-2" value="admin">Admin</option>
                            <option class="mt-2" value="doctor">Doctor</option>
                            <option class="mt-2" value="student">Student</option>
                            @elseif( $account->user_type == 'admin')
                            <option class="mt-2" value="super-admin">Super-Admin</option>
                            <option class="mt-2" value="doctor">Doctor</option>
                            <option class="mt-2" value="student">Student</option>
                            @elseif( $account->user_type == 'doctor')
                            <option class="mt-2" value="super-admin">Super-Admin</option>
                            <option class="mt-2" value="admin">Admin</option>
                            <option class="mt-2" value="student">Student</option>
                            @elseif( $account->user_type == 'student')
                            <option class="mt-2" value="super-admin">Super-Admin</option>
                            <option class="mt-2" value="admin">Admin</option>
                            <option class="mt-2" value="doctor">Doctor</option>
                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center m-4">
                <x-primary-button class="ml-4">
                    {{ __('Edit Account') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>