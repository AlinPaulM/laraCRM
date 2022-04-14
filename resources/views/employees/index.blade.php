<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="text-lg font-semibold">
            <a href="{{ route('employees.create') }}">New Employee</a>
        </div>
        <br>

        @foreach ($employees as $employee)
            <div>
                <a href="{{ route('employees.show', ['employee' => $employee->id]) }}">
                    {{ $employee->first_name.' '.$employee->last_name }}
                </a>
            </div>
        @endforeach

        <div>{{ $employees->links() }}</div>
    </div>
</x-app-layout>