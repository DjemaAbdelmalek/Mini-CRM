<?php

namespace App\Livewire;

use App\Models\Clients;
use App\Models\Zone;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ClientComponent extends Component
{
    use WithPagination;
    // creations validation/variables
    #[Validate("string|max:255|min:2|required")]
    public $name;
    #[Validate("email|nullable")]
    public $email;
    #[Validate("integer|max:10|nullable")]
    public $phone;
    #[Validate("string|max:25|nullable")]
    public $company_name;
    #[Validate("string")]
    public $status="";
    #[Validate("string|max:512|nullable")]
    public $notes;
    #[Validate("integer")]
    public $zone_id="";

    // Search variables
    public $search= "";
    public $zoneSearch = "";
    public $statusSearch = "";
    protected $updatesQueryString = ['search', 'zoneSearch','statusSearch'];
    protected $queryString = ['search', 'zoneSearch','statusSearch'];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingZoneSearch()
    {
        $this->resetPage();
    }
    public function updatingStatusSearch()
    {
        $this->resetPage();
    }

    public function createClient()
    {
        if($this->status==""){
            $errors['status'] = 'choose a status';;
        }
        if($this->zone_id==""){
            $errors['zone_id'] = 'choose a zone';;
        }

        $this->validate();
        if (!empty($errors)) {
            throw ValidationException::withMessages($errors);
        }
        Clients::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'company_name'=> $this->company_name,
            'status'=> $this->status,
            'notes'=> $this->notes,
            'zone_id'=> $this->zone_id
        ]);
        $this->reset();
        return redirect(route('clients'));
    }
    public function render()
    {
        $zones = Zone::latest()->get();
        $clients = Clients::query()
        ->where(function ($query) {
            $query->where('name','like',"%{$this->search}%")
                ->orWhere('email','like',"%{$this->search}%")
                ->orWhere('phone','like',"%{$this->search}%")
                ->orWhere('email','like',"%{$this->search}%");
            })
        ->where('zone_id', 'like', "%{$this->zoneSearch}%")
        ->where('status','like',"{$this->statusSearch}%")
        ->latest()
        ->paginate(10);
        return view('livewire.client-component',["zones" => $zones , "clients" => $clients])->layout('components.layouts',['title' => "Clients"]);
    }
}
