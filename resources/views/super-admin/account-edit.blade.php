<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Information
        </h2>
    </x-slot>
    <div>
        {{ $account->id }}
    </div>
    <div>
        {{ $account->first_name }} {{ $account->last_name }}
    </div>
</x-app-layout>