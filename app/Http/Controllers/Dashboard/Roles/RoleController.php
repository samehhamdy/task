<?php

namespace App\Http\Controllers\Dashboard\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('permission:create role', ['only' => ['create']]);
        $this->middleware('permission:edit role',   ['only' => ['edit']]);
        $this->middleware('permission:edit role',   ['only' => ['update']]);
        $this->middleware('permission:index role',   ['only' => ['index']]);
        $this->middleware('permission:delete role',   ['only' => ['destroy']]);
    }


    public function index()
    {
        $roles = Role::all();
        return view('Admin.Roles.index',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name'=>$request->name]);
        $role->givePermissionTo($request->permissions);
        return redirect()->back()->with('msg','Role created Successfully');
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
        $role = Role::findOrFail($id);
        return view('Admin.Roles.edit',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|unique:roles,name,'.$id,
        ]);
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        foreach (User::role($role)->get() as $user){
            $user->syncPermissions($request->permissions);
        }
        return redirect()->back()->with('msg','Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        foreach (User::role($role)->get() as $user){
            $user->revokePermissionTo($role->permissions);
        }
        $role->delete();
        return redirect()->back()->with('msg','Role Deleted Successfully');
    }
}
