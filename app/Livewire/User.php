<?php

namespace App\Livewire;

use App\Models\Role;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User as UserModel;

class User extends Component
{
    #[Validate("min:4|max:255|required|string")]
    public $name;
    #[Validate("email|required|unique:users,email")]
    public $email;
    #[Validate("min:2|required|confirmed")]
    public $password;
    public $password_confirmation;
    public $roleId = "";
    public function save(){
        $this->validate();
        if (empty($this->roleId)) {
            throw ValidationException::withMessages(["roleId" => "please select a role for this user"]);
        }
        $this->password = bcrypt($this->password);
        $role = Role::where("id",$this->roleId)->first();
        $user = UserModel::create([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
        ]);


        $user->roles()->attach($role->id);

        return redirect(route("users"));
    }

    public function delete($id){
        UserModel::findOrFail($id)->delete();
    }
    public function render()

    {
        $roles = Role::latest()->get();
        $users = UserModel::latest()->get();
        return view('livewire.user', [
            'roles' => $roles,
            'users' => $users
        ])->layout('components.layouts',['title' => 'Users']);
    }
}
