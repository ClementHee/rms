<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AllDetails extends Component
{
    public function render()
    {
        return view('livewire.all-details')->layout('livewire.all-details-layout');
    }
}
