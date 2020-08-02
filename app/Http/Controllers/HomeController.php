<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = Album::where('type','public')->paginate(6);
        return view('website.pages.home',['albums'=>$albums]);
    }

    public function show($id)
    {
        $album = Album::findOrFail($id);
        if($album->type == 'public' ){
            return view('website.pages.photos',['album'=>$album]);
        }else{
            abort(404);
        }
    }
}
