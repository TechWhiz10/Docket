<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Customers extends Component {

    public $customers, $customer_logo, $customer_name, $customer_account_manager, $first_name, $last_name, $status, $customer_id;

    public function render() {
        $this->customers = User::whereIn('role', [6, 7, 8])->get();
        return view('livewire.customers.index');
    }

    public function delete($id) {
        User::find($id)->delete();
        session()->flash('message', 'Customer Deleted Successfully.');
    }

}
