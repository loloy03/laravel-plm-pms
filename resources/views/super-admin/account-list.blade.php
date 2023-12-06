<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account List') }}
        </h2>
    </x-slot>
    @if (Session::has('success'))
    <x-success :message="Session::get('success')" />
    @endif
    <div class="flex justify-end">
        <form action="{{ route('accounts-search') }}" method="POST" class="mx-5 my-5">
            @csrf
            <input type="text" class="form-control rounded-md w-48 h-10" name="q" placeholder="Search Names...">
            <x-primary-button type="submit" class=" mb-auto">Search</x-primary-button>
        </form>
    </div>
    @foreach($accounts as $account)
    <div class="flex justify-center items-center ">
        <div class="w-full mx-5 md:mx-10 my-2 bg-white overflow-hidden rounded-sm text-sm flex flex-row p-5 rounded-md rounded-lg">
            <div class="basis-3/4">
                <div class="text-xs flex">
                    <div> Account ID:</div>
                    <div class="ml-1 font-bold"> {{ $account->id }}</div>
                </div>
                <div class="text-xs">Created Date: {{ $account->created_at->format('F d, Y H:i:s') }}</div>
                <div class="flex">
                    <div>
                        Name:
                    </div>
                    <div class="ml-1 font-bold">
                        {{ ucfirst($account->first_name) }}
                    </div>
                    <div class="ml-1 font-bold">
                        {{ ucfirst($account->last_name) }}
                    </div>
                </div>
                <div class="flex">
                    <div>User Type:</div>
                    <div class="font-bold ml-1"> {{ strtoupper($account->user_type) }}</div>
                </div>
            </div>
            <div class="basis-1/4 flex justify-center items-center">
                <form action="{{ route('account-show', $account->id) }}" method="get">
                    @csrf
                    <button><i class="fa-regular fa-pen-to-square mr-3 text-md hover:text-yellow-500 transition ease-to-ease"></i></button>
                </form>
                <form action="{{ route('account-delete', $account->id) }}" method="POST">
                    @csrf
                    <button><i class="fa-solid fa-trash text-md hover:text-yellow-500 transition ease-to-ease"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>