<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InfoCard extends Component
{
    public $mark, $title, $value, $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mark, $title, $value, $icon)
    {
        $this->mark = $mark;
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.info-card');
    }
}
