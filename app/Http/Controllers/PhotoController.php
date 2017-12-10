<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\PhotoCategory;
use App\ImageHelper;
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
        return view("photo.create", [
            "current_date" => \Date::now()->format("Y-m-d"),
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
            "image" => "required|file|mimes:jpg,jpeg,png",
            "date" => "required|date",
            "category_id" => "sometimes|integer|min:0"
        ]);

        $data["image"] = ImageHelper::storeImage(request()->file("image"));
        
        Photo::create($data);

        return redirect()->back()->with("message-success-create", "Penambahan foto berhasil dilakukan.");
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
        return view("photo.edit", [
            "photo" => $photo,
            "categories" => PhotoCategory::all()
        ]);
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
            "image" => "sometimes|file|mimes:jpg,jpeg,png",
            "date" => "required|date",
            "category_id" => "sometimes|integer|min:0"
        ]);

        if (request()->file("image")) {
            Storage::delete($photo->image);
            Storage::delete($photo->thumbnail);
            $data["image"] = ImageHelper::storeImage(request()->file("image"));
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
