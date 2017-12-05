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
        $promotional_texts = [];
        $promotional_texts[] = Label::fetchByTagname("promotional_1");
        $promotional_texts[] = Label::fetchByTagname("promotional_2");
        $promotional_texts[] = Label::fetchByTagname("promotional_3");

        return view("welcome", [
            "slides" => Photo::orderBy("created_at", "desc")->limit(3)->get(),
            "photos" => $latest_photos,
            "promotional_texts" => $promotional_texts,
            "welcome_text" => Label::fetchByTagname("welcome"),
            "phone" => Label::fetchByTagname("phone")->caption,
            "email" => Label::fetchByTagname("email")->caption
        ]);
    }

    public function gallery()
    {
        return view("gallery", ["photos" => Photo::all()]);
    }
}
