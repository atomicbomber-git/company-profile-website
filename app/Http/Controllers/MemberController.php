<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Image;
use Storage;

class MemberController extends Controller
{
    public function index()
    {
        return view("member.index", ["members" => Member::all()]);
    }

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
        return view("member.edit", ["member" => $member]);
    }

    public function update(Member $member)
    {
        $data = request()->validate([
            "name" => "required|string|min:6",
            "position" => "required|string",
            "image" => "sometimes|file|mimes:jpg,jpeg,png"
        ]);

        if (request()->file("image")) {
            Storage::delete($member->image);
            Storage::delete($member->thumbnail);
            $data["image"] = $this->storeImage(request()->file("image"));
        }

        $member->update($data);

        return redirect()->back()->with("message-success-update", "Pengubahan data anggota tim berhasil dilakukan.");
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
