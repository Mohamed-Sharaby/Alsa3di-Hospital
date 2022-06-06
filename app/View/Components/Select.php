<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $title;
    public $name;
    public $options;
    public $size;
    public $items;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$name,$options='',$items=[], $value=null,$size=null)
    {
        //
        $this->title = $title;
        $this->name = $name;
        $this->options = $options;
        $this->size = $size;
        $this->items = $items;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
