<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('permission:create user', ['only' => ['create']]);
        $this->middleware('permission:edit user',   ['only' => ['edit']]);
        $this->middleware('permission:edit user',   ['only' => ['update']]);
        $this->middleware('permission:index user',   ['only' => ['index']]);
        $this->middleware('permission:delete user',   ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::all();
        return view('Admin.Users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create(array_merge($request->validated(),['password'=>Hash::make($request->password)]));
        if ($request->has('role')){
            $role = Role::where('name',$request->role)->first();
            $user->syncRoles($role);
            $user->givePermissionTo($role->permissions);
        }
        return redirect()->back()->with('msg','User Added Successfully');
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
        $user = User::findOrFail($id);
        return view('Admin.Users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        $user = User::findOrFail($id);
        is_null($request->password) ? $user->update($request->except('password')) :  $user->update(array_merge($request->validated(),array('password'=>Hash::make($request->password))));
        if ($request->role) {
            $role = Role::where('name', $request->role)->first();
            $user->syncRoles($role);
            $user->givePermissionTo($role->permissions);
        }
        return redirect()->back()->with('msg','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('msg','User Deleted Successfully');
    }

    public function admins(){
        $role = Role::where('name','admin')->first();
        if ($role){
            $users = User::role('admin')->get();
            return view('Admin.Users.index',['users'=>$users]);
        }else{
            abort(404);
        }

    }
}
