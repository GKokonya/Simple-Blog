<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
class IndexPermissions extends Component
{
    #variable that wil be used to search fof a user in the database 
    public $search_keyword;
    
    #id used to identify the current logged in user
    public $user_id;

    #returns all permissions in the system
    public function render()
    {
        $permissions = Permission::search('name',$this->search_keyword)->latest()->paginate(10);
        return view('livewire.index-permissions',['permissions'=>$permissions])->extends('layouts.dashboard');
    }

     #search for permission based on name of the permission
     public function search(){
        $validated=$this->validate([
            'search_keyword'=>'min:0|max:255'
        ]);
        $this->search_keyword=$validated['search_keyword'];  
    }
}
