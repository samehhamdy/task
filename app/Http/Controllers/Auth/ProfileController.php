<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth()->user();
        return view('website.pages.profile',['user'=>$user]);
    }

    public function update(UserRequest $request){
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
        ]);
        $user = User::findOrFail(auth()->user()->id);
        is_null($request->password) ? $user->update($request->except('password')) :  $user->update(array_merge($request->validated(),array('password'=>Hash::make($request->password))));
        return redirect()->back()->with('msgw','Profile Updated Successfully');
    }
}
