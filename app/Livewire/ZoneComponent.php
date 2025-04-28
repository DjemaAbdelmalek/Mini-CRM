<?php

namespace App\Livewire;

use App\Models\Zone;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ZoneComponent extends Component
{
    #[Validate('required|min:2|max:10|string')]
    public $name;
    public function createZone()
    {
        $this->validate();
        Zone::create(['name'=> $this->name]);
        $this->reset();
        return redirect(route("zones"));
    }

    public function deleteZone($id)
    {
        Zone::findorFail($id)->delete();
    }

    public function editZone($id,$name)
    {
        Zone::find($id)->update(["name"=> $name]);
    }
    public function render()
    {
        $zones = Zone::latest()->get();
        return view('livewire.zone-component',[
            "zones" => $zones,
        ])->layout('components.layouts',['title' => 'Zones']);
    }
}
