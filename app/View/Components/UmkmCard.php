<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UmkmCard extends Component
{

    public $umkm;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($umkm)
    {
        //
        $this->umkm = $umkm;
    }

    public $id;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.umkm-card');
    }
}
