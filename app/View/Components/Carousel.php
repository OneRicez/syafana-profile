<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Carousel extends Component
{
    public array $slides;
    
    public function __construct(array $slides = [])
    {
        $this->slides = $slides;
    }

    public function render(): View
    {
        return view('components.carousel');
    }
}