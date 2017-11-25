<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Storage;

class PhotoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("photo.create", ["photos" => Photo::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            "name" => "required|string|min:6",
            "image" => "required|file|mimes:jpg,jpeg,png"
        ]);

        $data["image"] = request()->file("image")->store("photos");
        Photo::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return response()->file(storage_path("app/$photo->image"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view("photo.edit", ["photo" => $photo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Photo $photo)
    {
        $data = request()->validate([
            "name" => "required|string|min:6",
            "image" => "sometimes|file|mimes:jpg,jpeg,png"
        ]);

        if (request()->file("image")) {
            Storage::delete($photo->image);
            $data["image"] = request()->file("image")->store("photos");
        }

        $photo->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        \Storage::delete($photo->image);
        $photo->delete();

        return redirect()->back();
    }
}
