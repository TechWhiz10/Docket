<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\User;

class Team extends Component {

    public $customers;

    public function render() {
        $this->customers = User::whereIn('role', [6, 7, 8])->get();
        return view('livewire.team.index');
    }

}
