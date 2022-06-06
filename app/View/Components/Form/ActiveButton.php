<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ActiveButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $status, $id, $type;

    public function __construct($status, $id, $type)
    {
        $this->status = $status;
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.active-button');
    }
}
