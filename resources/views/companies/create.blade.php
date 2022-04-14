<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Company') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-errors :any="$errors->any()" :errors="$errors->all()" />

        <form method="POST" action="{{ route('companies.store') }}"  enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" />
            </div>

            <div class="mt-4">
                <x-label for="website" :value="__('Website')" />
                <x-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')" />
            </div>

            <div class="mt-4">
                <x-label for="logo" :value="__('Logo')" />
                <x-input name="logo" type="file" accept="image/*" />
            </div>

            <div class="mt-4">
                <x-button>{{ __('Create') }}</x-button>
            </div>
        </form>
    </div>
</x-app-layout>