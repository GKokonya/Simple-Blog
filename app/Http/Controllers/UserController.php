<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

use Auth;
class UserController extends Controller
{
    #method used to return a view to edit a user
    public function edit(User $user): View
    {
        $roles = Role::wherenot('name','super-admin')->pluck('name', 'id');

        return view('users.edit', compact('user', 'roles'));
    }

    #method used to return view for editing password for currently loggined user
    public function editPassword(User $user): View
    {
        return view('users.edit-password', compact('user'));
    }

    #method that return a view to edit other users passwords
    public function editOtherUserPassword(User $user): View
    {
        $login_user=User::find(Auth::user()->id);

        if( $user->hasRole('super-admin') && $login_user->hasRole('admin') ){
            abort(403);
        }
        return view('users.edit-other-user-password', compact('user'));
    }

    #method used to update password for other users(this will be used by admin/super-admin)
    public function updateOtherUserPassword(Request $request, User $user)
    {
        $login_user=User::find(Auth::user()->id);

        if( $user->hasRole('super-admin') && $login_user->hasRole('admin') ){
            abort(403);
        
        }else{

            $validated=$request->validate([
                'new_password'=>'required|string|min:8|confirmed'
            ]);

            User::whereId($user->id)->update(['password'=>Hash::make($validated['new_password'])]);
            session()->flash('success_user_password_message','password sucessfully updated!');       
            return redirect()->back();

        }
        
    }

    #method used to update password
    public function updatePassword(Request $request, User $user)
    {
        
        $validated=$request->validate([
            'old_password'=>'required',
            'new_password' => 'required|confirmed'
        ]);

        if( $user->hasRole('regular') && Auth::user()->id!=$user->id){
            abort(403);
        }
    
        if(!Hash::check($validated['old_password'],Auth::user()->password)){
            session()->flash('error_user_password_message','Old password does not match');
            return redirect()->back();
        }else{
            User::whereId($user->id)->update([
                'password'=>Hash::make($validated['new_password'])
                ]);
            session()->flash('success_user_password_message','password sucessfully updated!');       
            return redirect()->back();
        }
        
    }

    #method used to update a user
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'roles' => ['required', 'array'],
        ]);

        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index');
    }
}
