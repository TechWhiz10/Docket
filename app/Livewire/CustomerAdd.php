<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\User;

class CustomerAdd extends Component {

    use WithFileUploads;

    public $customer_id, $customer_name, $first_name, $last_name, $email, $phone, $site_name, $customer_logo;
    public $stage = 3 , $status = 5;

    public function render() {
        return view('livewire.customers.create');
    }

    public function changeStage() {
        $this->stage = $this->stage;
    }

    public function changeStatus() {
        $this->status = $this->status;
    }

    public function store() {

        $this->validate([
            'customer_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'site_name' => 'required',
            'customer_logo' => 'image|max:1024',
        ]);

        $file = md5($this->customer_logo . microtime()).'.'.$this->customer_logo->extension();
        $this->customer_logo->storeAs('logos', $file, 'public_upload');

        User::create([
            'customer_name' => $this->customer_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'site_name' => $this->site_name,
            'customer_logo' => $file,
            'role' => 6,
            'stage' => $this->stage,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Customer Created Successfully.');

        return redirect()->route('customer');
    }

}
