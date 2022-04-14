<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="container">
        @if($company->logo)
            <img src="{{ $company->logo }}" width="100" height="100">
        @endif

        <p>Email: {{ $company->email }}</p>
        <p>Website: {{ $company->website }}</p>
        <p>
            <a href="{{ '...' }}">Employees</a>
        </p>

        <br>
        <div>
            <div>
                <a href="{{ route('companies.edit', ['company' => $company->id]) }}">Edit</a>
            </div>
            <div>
                <form method="POST" action="{{ route('companies.destroy', ['company' => $company->id]) }}">
                    @csrf
                    @method('DELETE')

                    <button class="text-sm text-gray-400">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>