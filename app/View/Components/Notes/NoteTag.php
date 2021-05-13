<?php

namespace App\View\Components\Notes;

use Illuminate\View\Component;

class NoteTag extends Component
{
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function typeColor()
    {
        return substr(md5($this->name), 0, 6);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notes.note-tag', ['color' => $this->typeColor()]);
    }
}
