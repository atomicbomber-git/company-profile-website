<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Slide;
use App\Label;

class MainController extends Controller
{
    public function welcome()
    {
        $latest_photos = Photo::orderBy("created_at", "desc")->limit(3)->get();

        $promotional_texts = [];
        $promotional_texts[] = Label::find(config("labels.id.promotional.first"));
        $promotional_texts[] = Label::find(config("labels.id.promotional.second"));
        $promotional_texts[] = Label::find(config("labels.id.promotional.third"));

        return view("welcome", ["slides" => Slide::all(), "photos" => $latest_photos, "promotional_texts" => $promotional_texts]);
    }

    public function gallery()
    {
        return view("gallery", ["photos" => Photo::all()]);
    }
}
