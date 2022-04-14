<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Employee') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-errors :any="$errors->any()" :errors="$errors->all()" />

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <div>
                <x-label for="first_name" :value="__('First name')" />
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <div>
                <x-label for="last_name" :value="__('Last name')" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" />
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            </div>

            <div class="mt-4">
                <x-button>{{ __('Create') }}</x-button>
            </div>
        </form>
    </div>
</x-app-layout>