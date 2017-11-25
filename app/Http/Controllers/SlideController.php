<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Storage;

class SlideController extends Controller
{
    public function create()
    {
        return view("slide.create", ["slides" => Slide::all()]);
    }

    public function store()
    {
        $data = request()->validate([
            "caption" => "required|string|min:6",
            "description" => "required|string|min:6",
            "image" => "required|file|mimes:jpg,jpeg,png"
        ]);

        $data["image"] = request()->file("image")->store("slides");
        Slide::create($data);

        return redirect()->back();
    }

    public function show(Slide $slide)
    {
        return response()->file(storage_path("app/$slide->image"));
    }

    public function destroy(Slide $slide)
    {
        Storage::delete($slide->image);
        $slide->delete();
        return redirect()->back();
    }
}
