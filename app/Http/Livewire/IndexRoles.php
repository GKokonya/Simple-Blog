<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Livewire\WithPagination;

use Auth;

class IndexRoles extends Component
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

    #return roles stored in the database
    public function render()
    {
        $roles= Role::with('permissions')->search('roles.name',$this->search_keyword)->paginate(10); 
        return view('livewire.index-roles',['roles'=>$roles])->extends('layouts.dashboard');
    }



    #search for role based on the name of the role
    public function search(){
        $validated=$this->validate([
            'search_keyword'=>'min:0'
        ]);
        $this->search_keyword=$validated['search_keyword'];  
    }
}