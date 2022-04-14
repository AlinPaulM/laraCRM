<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLinks extends Component
{
    /**
     * The navigation routes links.
     * An associative array, where key is the route name and value is the route itself
     */
    public array $routes = [
        'dashboard' => 'dashboard',
        'companies' => 'companies.index',
        'employees' => 'employees.index',
    ];

    // Whether the links are normal links or responsive links(for mobile view)
    public bool $responsive;

    /**
     * Create a new component instance.
     *
     * @param bool $responsive
     * @return void
     */
    public function __construct(bool $responsive)
    {
        $this->responsive = $responsive;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-links');
    }
}
