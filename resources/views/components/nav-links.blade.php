@if($responsive === true)
    @foreach($routes as $name => $route)
        <x-responsive-nav-link :href="route($route)" :active="request()->routeIs($route)">
            {{ __($name) }}
        </x-responsive-nav-link>
    @endforeach
@else
    @foreach($routes as $name => $route)
        <x-nav-link :href="route($route)" :active="request()->routeIs($route)">
            {{ __($name) }}
        </x-nav-link>
    @endforeach
@endif