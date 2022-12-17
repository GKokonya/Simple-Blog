<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Auth;
class IndexUsers extends Component
{
    use WithPagination;

    #variable that wil be used to search fof a user in the database 
    public $search_keyword;
    
    #id used to identify the current logged in user
    public $user_id;

    #Initialize certain variables before the livewire component  renders
    public function mount(){
        $this->user_id=Auth::user()->id;
    }

    #render/returns users in the system
    public function render()
    {
        $users= User::with('roles')->search('users.email',$this->search_keyword)->latest()->paginate(10);
        return view('livewire.index-users',['users'=>$users])->extends('layouts.dashboard');
    }

    #search for user based on the username
    public function search(){
        $validated=$this->validate([
            'search_keyword'=>'min:0|max:255'
        ]);
        $this->search_keyword=$validated['search_keyword'];  
    }
}
