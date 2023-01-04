<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardLinks extends Component
{
    public function render(){
    
        $posts=['posts.index','posts.create','posts.edit'];
        $categories=['categories.index','categories.create', 'categories.edit'];
        $users=['users.index','users.edit'];
        $roles=['roles.index','roles.create','roles.edit'];
        $permissions=['permissions.index','permissions.create','permissions.edit'];

        return view('livewire.dashboard-links',[
            'posts'=>$posts,
            'categories'=>$categories,
            'users'=>$users,
            'roles'=>$roles,
            'permissions'=>$permissions
        ]);
    }
}
