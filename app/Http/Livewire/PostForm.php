<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as PostDB;

 
use Auth;
class PostForm extends Component
{
    public $title;
    public $content;
    public $modelID;

    protected $listeners=[
        'getModelID'
    ];

    PUBLIC function getModelID($modelID){
        $this->modelID=$modelID;
        $model=PostDB::find($modelID);
        $this->title=$model->title;
        $this->content=$model->content;
    }

    public function save(){
        $this->validate([
            'title'=>'required',
            'content'=>'required',

        ]);

        $user_id=Auth::user()->id;

        if($this->modelID){
            $model=PostDB::find($this->modelID);
            $model->title=$this->title;
            $model->content=$this->content;
            $model->user_id=$user_id;
            $model->save();
        }else{
            PostDB::Create([
                'title'=>$this->title,
                'content'=>$this->content,
                'user_id'=>$user_id,
            ]);
        }


        $this->emit('refreshParent');
        $this->clearVars();
        $this->dispatchBrowserEvent('closeModal');
        
    }

    public function clearVars(){
        $this->modelID=null;
        $this->title=null;
        $this->content=null;
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
