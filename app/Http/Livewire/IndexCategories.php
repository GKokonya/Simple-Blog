<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\category;
use Livewire\WithPagination;
use Auth;
class IndexCategories extends Component
{
    use WithPagination;

    #variable that wil be used to search fof a user in the database 
    public $search_keyword;

    #render posts in a blade view
    public function render()
    {
        $categories=category::search('title',$this->search_keyword)->latest()->paginate(10);; 
        return view('livewire.index-categories',['categories'=>$categories])->extends('layouts.dashboard');
    }

        #method used to delete a categories
        public function destroy($id)
        {
            try{
                $post = category::find($id);
                $post->delete();
                session()->flash('message', 'Category deleted successfully');
            }catch(\Exception $e){
                DB::rollBack();
                session()->flash('message', 'Error! Category not delete');
            }
    
        }
}
