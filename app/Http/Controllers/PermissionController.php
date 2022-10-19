<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::paginate(5); // Returns a collection
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.permissions.create');
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

        $validated=$request->validate(['name'=>['required','min:3']]);
        Permission::create($validated);
        return redirect()->route('admin.permissions.index');
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
        $roles = Role::all(); // Returns a collection
        $permission=Permission::find($id);
        return view('admin.permissions.edit',compact('permission','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Permission $permission)
    {
        //
        $per=Permission::find($permission->id);
        $validated=$request->validate(['name'=>'required']);
        $per->update($validated);
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
        $permission->delete();
        return back()->with('message','Permission deleted');
    }

        /**
     * Assign Role to a Permissiom
     */

    public function assignRole(Request $request,Permission $permission){
        if($permission->hasRole($request->role)){
            return back()->with('assign-role','role already exists!');
        }else{
            $permission->assignRole($request->role);
            return back()->with('assign-role','role assigned to permission');
        }
    }

    public function removeRole(Permission $permission, Role $role){
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('remove-role','Role Removed');
        }
    }

}
