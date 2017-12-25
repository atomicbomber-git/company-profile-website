<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\PhotoLocation;

class PhotoLocationController extends Controller
{
    public function index()
    {
        return view("photo-location.index", [
            "locations" => PhotoLocation::all()
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            "name"=> "required|string|min:1|unique:photo_locations"
        ]);

        PhotoLocation::create($data);

        return redirect()->back()
            ->with("photo-location-create-success", "Kategori foto berhasil ditambahkan.");
    }

    public function delete(PhotoLocation $location)
    {
        $location->delete();
        return redirect()->back()
            ->with("photo-location-delete-success", "Kategori foto berhasil dihapus.");
    }

    public function update(PhotoLocation $location)
    {
        $data = request()->validate([
            "name"=> ["required", "string", "min:1", Rule::unique("photo_locations")->ignore($location->id)]
        ]);

        $location->update($data);

        session()->flash("photo-location-update-success", "Kategori foto berhasil diubah");

        return response()->json([
            "status" => "success"
        ]);
    }
}
