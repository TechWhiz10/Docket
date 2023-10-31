<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\User;

class Department extends Component {

    public $customers;

    public function render() {
        $this->customers = User::whereIn('role', [6, 7, 8])->get();
        return view('livewire.department.index');
    }

}
