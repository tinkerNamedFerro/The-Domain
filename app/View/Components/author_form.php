<?php

namespace App\View\Components;

use Illuminate\View\Component;

class author_form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $author;
    public function __construct($author)
    {
        dd($author);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.author_form');
    }
}
