<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Users extends Component {

    public $users, $first_name, $last_name, $email, $password, $role, $user_id;
    public $is_open = 0, $is_create = 0;

    public function render() {
        $this->users = User::whereIn('role', [1, 2, 3, 4, 5])->get();
        return view('livewire.users.index');
    }

    public function create() {
        $this->is_create = true;
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal() {
        $this->is_open = true;
    }

    public function closeModal() {
        $this->is_open = false;
    }

    public function resetInputFields() {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
        $this->user_id = '';
    }

    public function store() {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'role' => 'required',
        ]);

        $password = $this->is_create == true ? Hash::make($this->password) : $this->password;

        User::updateOrCreate(['id' => $this->user_id], [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $password,
            'role' => $this->role,
        ]);

        session()->flash('message',
            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id) {
        $this->is_create = false;

        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->role = $user->role;

        $this->openModal();
    }

    public function delete($id) {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }

}
