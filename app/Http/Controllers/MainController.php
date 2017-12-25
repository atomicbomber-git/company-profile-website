<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\PhotoCategory;
use App\PhotoLocation;
use App\Slide;
use App\Label;
use App\Member;

class MainController extends Controller
{
    public function welcome()
    {
        $promotional_texts = [];
        $promotional_texts[] = Label::fetchByTagname("promotional_1");
        $promotional_texts[] = Label::fetchByTagname("promotional_2");
        $promotional_texts[] = Label::fetchByTagname("promotional_3");

        return view("welcome", [
            "slides" => Slide::all(),
            "photos" => Photo::orderBy("created_at", "desc")->limit(3)->get(),
            "members" => Member::orderBy("created_at", "desc")->limit(3)->get(),
            "promotional_texts" => $promotional_texts,
            "welcome_text" => Label::fetchByTagname("welcome"),
            "phone" => Label::fetchByTagname("phone")->caption,
            "email" => Label::fetchByTagname("email")->caption
        ]);
    }

    public function gallery()
    {
        $category_id = request()->query("category");
        $location_id = request()->query("location");

        $photos = Photo::when(
            $category_id,
            function($query) use($category_id) {
                $query->where("category_id", $category_id);
            }
        )->when(
            $location_id,
            function($query) use($location_id) {
                $query->where("location_id", $location_id);
            }
        )
        ->get();

        return view("gallery", [
            "photos" => $photos,
            "categories" => PhotoCategory::all(),
            "locations" => PhotoLocation::all(),
            "current_category" => PhotoCategory::find($category_id),
            "current_location" => PhotoLocation::find($location_id)
        ]);
    }
}
