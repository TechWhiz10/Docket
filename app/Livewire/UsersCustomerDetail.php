<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;

class UsersCustomerDetail extends Component {

    public $customer, $tab = 1;

    public function mount($id) {
        $this->customer = User::find($id);
    }

    public function render() {
        return view('livewire.users.users-customer-detail', [
            'customer' => $this->customer,
        ]);
    }

    public function selectTab($tab) {
        $this->tab = $tab;
    }

}
