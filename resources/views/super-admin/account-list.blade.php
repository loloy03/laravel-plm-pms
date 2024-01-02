<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account List') }}
        </h2>
    </x-slot>
    @if (Session::has('success'))
    <x-success :message="Session::get('success')" />
    @endif
    <div class="flex text-sm">
        <div class="flex justify-start">
            <form action="{{ route('accounts-search') }}" method="POST" class="mx-5 my-5">
                @csrf
                <input type="text" class="form-control rounded-md w-48 h-8 text-sm" name="q" placeholder="Search Names...">
                <x-primary-button type="submit" class=" mb-auto">Search</x-pimary-button>
            </form>
        </div>
        <div class="my-4 flex items-center space-x-4 justify-end">
            <span class="font-bold">Sort By:</span>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="px-4 py-2 rounded-md border border-gray-300 text-gray-600 hover:bg-gray-100 transition duration-300 ease-in-out">
                    Select
                    <svg class="h-4 w-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute z-50 mt-2 bg-white rounded-md border border-gray-300 shadow-md">
                    <a href="{{ route('account-list', ['sort' => 'admin']) }}" class="block px-4 py-2 hover:bg-gray-100">Admin</a>
                    <a href="{{ route('account-list', ['sort' => 'super-admin']) }}" class="block px-4 py-2 hover:bg-gray-100">Super Admin</a>
                    <a href="{{ route('account-list', ['sort' => 'student']) }}" class="block px-4 py-2 hover:bg-gray-100">Student</a>
                    <a href="{{ route('account-list', ['sort' => 'doctor']) }}" class="block px-4 py-2 hover:bg-gray-100">Doctor</a>
                    <a href="{{ route('account-list') }}" class="block px-4 py-2 hover:bg-gray-100">Reset Sorting</a>
                </div>
            </div>
        </div>
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
    <div class="p-10">
        {{ $accounts->links() }}
    </div>
</x-app-layout>