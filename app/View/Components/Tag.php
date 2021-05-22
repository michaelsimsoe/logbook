<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tag extends Component
{
    public $name;
    public $id;
    public $taggableType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $taggableType, $id)
    {
        $this->name = $name;
        $this->id = $id;
        $this->taggableType = $taggableType;
    }

    public function typeColor()
    {
        return substr(md5($this->name), 0, 6);
    }

    protected function indexLink()
    {
        return $this->taggableType . '.index';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tag', ['color' => $this->typeColor(), 'link' => $this->indexLink()]);
    }
}
