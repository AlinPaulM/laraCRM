<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-errors :any="$errors->any()" :errors="$errors->all()" />

        <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
            @csrf
            @method('PATCH')

            <div>
                <x-label for="first_name" :value="__('First name')" />
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$employee->first_name" required autofocus />
            </div>

            <div>
                <x-label for="last_name" :value="__('Last name')" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$employee->last_name" required />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$employee->email" />
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$employee->phone" />
            </div>

            <div class="mt-4">
                <x-button>{{ __('Save') }}</x-button>
            </div>
        </form>
    </div>
</x-app-layout>