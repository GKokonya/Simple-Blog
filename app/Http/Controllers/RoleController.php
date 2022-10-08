<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::whereNotIn('name', ['Administrator',])->get();
        return view('admin.roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated=$request->validate(['name'=>['required','min:3','unique:roles']]);
        Role::create($validated);
        return to_route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permissions = Permission::all(); // Returns a collection
        $role=Role::find($id);
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role )
    {
        //
        $rol=Role::find($role->id);
        $validated=$request->validate(['name'=>'required|unique:roles']);
        $rol->update($validated);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message','Role deleted');
    }

    /**
     * Assign Permission to a role
     */

    public function givePermission(Request $request,Role $role){
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message','permission aldready exists');
        }else{
            $role->givePermissionTo($request->permission);
            return back()->with('give-permission','permission added to role');
        }
    }

        /**
     * Remove Permission to a role
     */

    public function revokePermission(Role $role,Permission $permission){
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('revoke-permission','permission revoked');
        }
    }


}
