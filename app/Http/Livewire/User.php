<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User as DBUser;


class User extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;


    public function store()
    {
        $data=$this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' =>   'required',
        ]);

        DBUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->dispatchBrowserEvent('show-form');

    }
    public function render()
    {
        $users=DBuser::all();
        return view('livewire.user',compact('users'));
    }
}
