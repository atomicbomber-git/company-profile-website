<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
