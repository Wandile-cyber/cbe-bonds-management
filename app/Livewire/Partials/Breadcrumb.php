<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $title;
    public $breadcrumbItems;

    public function render()
    {
        return view('livewire.partials.breadcrumb');
    }
}