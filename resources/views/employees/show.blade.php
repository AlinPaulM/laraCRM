<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $employee->first_name.' '.$employee->last_name }}
        </h2>
    </x-slot>

    <div class="container">
        <p>Email: {{ $employee->email }}</p>
        <p>Phone: {{ $employee->phone }}</p>
        <p>
            @if($employee->company !== null)
            <a href="{{ route('companies.show', ['company' => $employee->company->id]) }}">
                Company: {{$employee->company->name}}
            </a>
            @else
            <p>Company: <i>(deleted)</i></p>
            @endif
        </p>

        <br>
        <div>
            <div>
                <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Edit</a>
            </div>
            <div>
                <form method="POST" action="{{ route('employees.destroy', ['employee' => $employee->id]) }}">
                    @csrf
                    @method('DELETE')

                    <button class="text-sm text-gray-400">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>