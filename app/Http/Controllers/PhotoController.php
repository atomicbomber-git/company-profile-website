<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\PhotoCategory;
use Storage;
use Image;

class PhotoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("photo.create", [
            "photos" => Photo::all(),
            "categories" => PhotoCategory::all()
        ]);
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

        $data["image"] = $this->storeImage( request()->file("image") );
        
        Photo::create($data);

        return redirect()->back()->with("message-success-create", "Penambahan foto berhasil dilakukan.");
    }

    private function storeImage($image) {
        $filename = $image->store(config("files.location.photo"));

        /* Creates a thumbnail from image and stores it */
        $thumbnail = Image::make($image)->resize(config("files.thumbnail.width"), config("files.thumbnail.height"))->encode();
        Storage::put(config("files.thumbnail.location") . "/" . $filename, (string) $thumbnail);

        return $filename;
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

    public function thumbnail(Photo $photo)
    {
        return response()->file(storage_path("app/$photo->thumbnail"));
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
            Storage::delete($photo->thumbnail);
            $data["image"] = $this->storeImage(request()->file("image"));
        }

        $photo->update($data);

        return redirect()->back()->with("message-success-update", "Pengubahan foto berhasil dilakukan.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        Storage::delete($photo->image);
        Storage::delete($photo->thumbnail);
        $photo->delete();

        return redirect()->back()->with("message-success-delete", "Penghapusan berhasil dilakukan.");
    }
}
