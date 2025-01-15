<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use illuminate\Support\Str;
use Illuminate\View\Component;

class Card extends Component
{
    public $index;
    public $title;
    public $releasedate;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($index, $title, $releasedate, $image)
    {
        //
        $this->index = $index;
        $this->title = Str::upper($title);
        $this->releasedate = $releasedate;
        $this->releasedate = Carbon::parse($releasedate)->format('M d Y');
        $this->image = $image;

    }
    public function getImage():string {
        if($this->image){
            return $this->image;
        }

        return 'https://placehold.co/300x450';
    }

    /**
     * Get the view / contents that represent the component.
     */


    public function render(): View|Closure|string
    {
        return view('components.movie.card');
    }
}
