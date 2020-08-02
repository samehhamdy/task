<?php

namespace App\Http\Controllers\Dashboard\Albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct() {
        $this->middleware('permission:index album', ['only' => ['index']]);
        $this->middleware('permission:delete album',   ['only' => ['delete']]);
    }

    public function index(){
        $albums = Album::all();
        return view('Admin.Albums.index',['albums'=>$albums]);
    }

}
