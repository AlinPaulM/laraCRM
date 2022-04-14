<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-errors :any="$errors->any()" :errors="$errors->all()" />

        <form method="POST" action="{{ route('companies.update', ['company' => $company->id]) }}"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$company->name" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$company->email" />
            </div>

            <div class="mt-4">
                <x-label for="website" :value="__('Website')" />
                <x-input id="website" class="block mt-1 w-full" type="text" name="website" :value="$company->website" />
            </div>

            @if($company->logo)
            <div class="mt-4">
                <img src="{{ $company->logo }}" width="100" height="100">
            </div>
            @endif

            <div class="mt-4">
                <x-label for="logo" :value="__('New Logo')" />
                <x-input name="logo" type="file" accept="image/*" />
            </div>

            <div class="mt-4">
                <x-button>{{ __('Save') }}</x-button>
            </div>
        </form>
    </div>
</x-app-layout>