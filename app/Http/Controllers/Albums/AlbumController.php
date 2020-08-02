<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = auth()->user()->albums()->paginate(6);
        return view('website.pages.Albums.index',['albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.pages.Albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $album = auth()->user()->albums()->create($request->validated());
        if ($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $image){
                $imgExt = $image->getClientOriginalExtension();
                $imgName = mt_rand(100,999).'-'.$album->id.'-'.$album->name.'.'. $imgExt;
                $image->move(public_path('images/albums/'.$album->name.'-'.$album->id.'/'), $imgName);
                $album->photos()->create([
                    'name'=>$imgName,
                    'link'=>url('/').'/images/albums/'.$album->name.'-'.$album->id.'/'.$imgName
                ]);
            }
        }
        return redirect()->back()->with('msgw','Album created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);
        $photos = $album->photos()->paginate(6);
        return view('website.pages.Albums.show',['album'=>$album,'photos'=>$photos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('website.pages.Albums.edit',['album'=>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, $id)
    {
        $album = Album::findOrFail($id);
        $album->whereId($id)->update($request->except('images','_token','_method'));
        if ($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $image){
                $imgExt = $image->getClientOriginalExtension();
                $imgName = mt_rand(100,999).'-'.$album->id.'-'.$album->name.'.'. $imgExt;
                $image->move(public_path('images/albums/'.$album->name.'-'.$album->id.'/'), $imgName);
                $album->photos()->create([
                    'name'=>$imgName,
                    'link'=>url('/').'/images/albums/'.$album->name.'-'.$album->id.'/'.$imgName
                ]);
            }
        }
        return redirect()->back()->with('msgw','Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        foreach ($album->photos as $photo){
            if(File::exists(public_path('/images/albums/'.$album->name.'-'.$album->id.'/'.$photo->name))){
                File::delete(public_path('/images/albums/'.$album->name.'-'.$album->id.'/'.$photo->name));
            }
        }
        rmdir(public_path('images\albums'.DIRECTORY_SEPARATOR.$album->name.'-'.$album->id));
        $album->delete();
        return redirect()->back()->with('msg','Album deleted successfully');
    }
}
