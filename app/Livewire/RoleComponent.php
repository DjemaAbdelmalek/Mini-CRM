<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RoleComponent extends Component
{
    #[Validate('min:2|max:255|required')]
    public $title ='';

    public function save()
    {
        $this->validate();
        Role::create([
            'name'=> $this->title,
            ]);
        $this->reset();
        return $this->redirect(route('roles'));
    }

    public function delete($id){
        Role::findOrFail($id)->delete();
    }


    public function render()
    {
        $roles = Role::latest()->get();
        return view('livewire.role-component',[
            "roles" => $roles
        ])->layout('components.layouts',['title' => 'Roles']);
    }
}
