<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TodaysNotes extends Component
{
    public $notes;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public function __construct($notes)
    {
        $this->notes = $notes;
    }

    public function render()
    {
        return view('components.todays-notes');
    }
}
