<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Information
        </h2>
    </x-slot>
    <div>
        {{ $user_info->id }}
    </div>
    <div>
        {{ $user_info->first_name }} {{ $user_info->last_name }}
    </div>
</x-app-layout>