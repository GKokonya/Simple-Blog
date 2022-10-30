<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post as PostDB;

use Auth;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;
    public $prompt;
    public $selectedItem;
    public $action;

    protected $listeners=[
        'refreshParent'=>'$refresh'
    ];

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }

    public function closeModal(){
        $this->dispatchBrowserEvent('closeModal');
    }

    public function selectItem($id,$action){
        $this->selectedItem=$id;
        $this->action=$action;
        if($action=='delete'){
            $this->dispatchBrowserEvent('openDeleteModal');
        }{
            $this->emit('getModelID',$id);
            $this->dispatchBrowserEvent('openModal');
            
        }
    }

    public function delete(){
        PostDB::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');
    }
    
    
    public function render()
    {
        $posts=PostDB::where('user_id','=',Auth::user()->id)->latest()->paginate(10);
        return view('livewire.post',compact('posts'));
    }
}
