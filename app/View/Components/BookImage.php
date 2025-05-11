<?php

namespace App\View\Components;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookImage extends Component
{
    public $book;
    public $class;
    public $alt;

    /**
     * Create a new component instance.
     */
    public function __construct($book, $class='img-fluid mb-2', $alt='Obálka knihy')
    {
        $this->book = $book;
        $this->class = $class;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-image');
    }
}
