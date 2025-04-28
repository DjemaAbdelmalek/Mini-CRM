<?php

namespace App\Livewire;

use Livewire\Component;

class ClientComponent extends Component
{
    public function render()
    {
        return view('livewire.client-component')->layout('components.layouts',['title' => "Clients"]);
    }
}
