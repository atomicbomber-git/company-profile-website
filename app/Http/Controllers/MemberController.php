<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Image;
use Storage;

class MemberController extends Controller
{
    public function create()
    {
        return view("member.create", ["members" => Member::all()]);
    }

    public function store()
    {
        $data = request()->validate([
            "name" => "required|string",
            "position" => "required|string",
            "image" => "required|file|mimes:jpg,jpeg,png"
        ]);

        $data["image"] = $this->storeImage( request()->file("image") );
        Member::create($data);

        return redirect()->back()->with("message-success-store", "Anggota tim berhasil ditambahkan.");
    }

    private function storeImage($image) {
        $filename = $image->store(config("files.location.photo"));

        /* Creates a thumbnail from image and stores it */
        $thumbnail = Image::make($image)->resize(config("files.thumbnail.width"), config("files.thumbnail.height"))->encode();
        Storage::put(config("files.thumbnail.location") . "/" . $filename, (string) $thumbnail);

        return $filename;
    }

    public function edit(Member $member)
    {

    }

    public function update(Member $member)
    {

    }

    public function destroy(Member $member)
    {
        Storage::delete($member->image);
        Storage::delete($member->thumbnail);
        $member->delete();

        return redirect()->back()->with("message-success-destroy", "Penghapusan berhasil dilakukan.");
    }

    public function show(Member $member)
    {
        return response()->file(storage_path("app/$member->image"));
    }

    public function thumbnail(Member $member)
    {
        return response()->file(storage_path("app/$member->thumbnail"));
    }
}
