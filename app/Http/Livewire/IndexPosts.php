<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
class IndexPosts extends Component
{
    use WithPagination;

    #id used to identify the current logged in user
    public $user_id;

    #variable that wil be used to search fof a user in the database 
    public $search_keyword;

    #inialize variables on mount
    public function mount(){
        $this->user_id=Auth::user()->id;
    }

    #render posts in a blade view
    public function render()
    {
        $user=User::find($this->user_id);
        $posts= ($user->hasAnyRole(['admin'])) ? $this->adminPosts() : $this->authorPosts(); 
        return view('livewire.index-posts',['posts'=>$posts])->extends('layouts.dashboard');
    }

    #get all posts
    public function adminPosts(){
        return $posts=Post::search('posts.title',$this->search_keyword)->latest()->paginate(10);
    }

    #get all post related to the logggin author
    public function authorPosts(){
        return $posts=Post::where('user_id',$this->user_id)->search('posts.title',$this->search_keyword)->latest()->paginate(10);
    }

    #search for user based on the username
    public function search(){
        $validated=$this->validate([
            'search_keyword'=>'min:0|max:255'
        ]);
        $this->search_keyword=$validated['search_keyword'];  
    }

    #method used to delete a posts
    public function destroy($id)
    {
        try{

            DB::beginTransaction();
                $post = Post::find($id);
                $post->delete();
            DB::commit();
            
            Storage::delete($post->image);
            session()->flash('message', 'Post deleted successfully');
        }catch(\Exception $e){
            DB::rollBack();
            session()->flash('message', 'Error! Post not delete');
        }

    }
    
}
