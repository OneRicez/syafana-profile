<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardComponent extends Component
{
    public $title;
    public $description;
    public $image;
    public $buttonText;
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $description, $image, $buttonText = 'Read more', $href)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->buttonText = $buttonText;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.card-component');
    }
}
