<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="container">
        @if($company->logo)
            <img src="{{ Storage::url($company->logo) }}" width="100" height="100">
        @endif

        <p>Email: {{ $company->email }}</p>
        <p>Website: {{ $company->website }}</p>
        <p>
            <span>Employees:</span>
            @if(!count($company->employees))
                <i>(none)</i>
            @else
                @foreach($company->employees as $employee)
                    <a href="{{ route('employees.show', ['employee' => $employee->id]) }}">
                        {{$employee->first_name.' '.$employee->last_name}}
                    </a>
                    @if(!$loop->last)
                    ,
                    @endif
                @endforeach
            @endif
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