<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Errors extends Component
{
    // if there's any errors
    public bool $any;

    // the errors
    public array $errors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $any, array $errors)
    {
        $this->any = $any;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.errors');
    }
}
