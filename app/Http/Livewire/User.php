<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Datatable\WithSorting;
use App\Http\Livewire\Datatable\WithBulkActions;
use App\Http\Livewire\Datatable\WithPerpagePagination;
use App\Models\User as DBUser;

class User extends Component
{
    use WithPagination, WithSorting,WithPerpagePagination;

    protected $queryString=['sortField','sortDirection','perPage'];

    protected $paginationTheme = 'bootstrap';

    public $selectPage=false;
    
    public $selected=[];

    public $filters=[
        'search'=>'',
        'id_min'=>null,
        'id_max'=>null,
        'name'=>'',
        'email'=>'',
    ];

    protected $listeners = ['refresh-component' => '$refresh'];

    public function resetFilters(){
        //reset changes the properties back to its original values
        $this->reset('filters');
    }

    public function updatedFilters(){
        $this->resetPage();
    }

    public function deleteSelected(){
        $users=DBUser::whereIn('id', $this->selected);

        $users->delete();

        $this->emitself('refresh-component');


    }

    public function updatedSelectPage($value){
        if($value){
            $this->selected=$this->users->pluck('id')->map(fn($id)=>(string) $id
        );
        }else{
            $this->selected=[];
        }
    }

    // Computed Property
    public function getUsersProperty()
    {
       
        $users=DBUser::query()
        ->when($this->filters['id_min'],function($query,$id_min){
            $query->where('id','>=',$id_min);
        })
        ->when($this->filters['id_max'],function($query,$id_max){
            $query->where('id','<=',$id_max);
        })
        ->when($this->filters['name'],function($query,$name){
            $query->where('name',$name);
        })
        ->when($this->filters['email'],function($query,$email){
            $query->where('email',$email);
        })
        ->when($this->filters['search'],function($query,$search){
            $query->where('name','LIKE','%'.$search.'%');
        });
        
        $new= $this->applySorting($users);

        return $this->applyPagination($new);

        
    }

    public function render()
    {
        

        return view('livewire.user',[
            'users'=>$this->users
        ]);
    }
}
