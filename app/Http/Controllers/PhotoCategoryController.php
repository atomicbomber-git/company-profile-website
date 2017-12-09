<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\PhotoCategory;

class PhotoCategoryController extends Controller
{
    public function index()
    {
        return view("photo-category.index", [
            "categories" => PhotoCategory::all()
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            "name"=> "required|string|min:1|unique:photo_categories"
        ]);

        PhotoCategory::create($data);

        return redirect()->back()
            ->with("photo-category-create-success", "Kategori foto berhasil ditambahkan.");
    }

    public function delete(PhotoCategory $category)
    {
        $category->delete();
        return redirect()->back()
            ->with("photo-category-delete-success", "Kategori foto berhasil dihapus.");
    }

    public function update(PhotoCategory $category)
    {
        $data = request()->validate([
            "name"=> ["required", "string", "min:1", Rule::unique("photo_categories")->ignore($category->id)]
        ]);

        $category->update($data);

        session()->flash("photo-category-update-success", "Kategori foto berhasil diubah");

        return response()->json([
            "status" => "success"
        ]);
    }
}
