<?php

namespace App\View\Components;

use Illuminate\View\Component;

class File extends Component
{

    public $title;
    public $types;
    public $name;
    public $size;
    public $options;

    public function __construct($title, $types, $name,$size=12, $options=null)
    {
        //

        $this->title = $title;
        $this->types = $types;
        $this->name = $name;
        $this->size = $size;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file');
    }
}
