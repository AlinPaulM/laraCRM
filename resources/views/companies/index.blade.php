<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="text-lg font-semibold">
            <a href="{{ route('companies.create') }}">New Company</a>
        </div>
        <br>

        @foreach ($companies as $company)
            <div>
                <a href="{{ route('companies.show', ['company' => $company->id]) }}">
                    {{ $company->name }}
                </a>
            </div>
        @endforeach

        <div>{{ $companies->links() }}</div>
    </div>
</x-app-layout>