<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (  !(auth()->attempt($request->only('email','password')) && auth()->user()->hasPermissionTo('login dashboard')) ){
            return redirect()->back()->with('error','invalid login');
        }
        return redirect(url('/dashboard'));
    }
}
