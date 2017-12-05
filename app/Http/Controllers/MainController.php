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
        $promotional_texts[] = Label::fetchByTagname("promotional_1");
        $promotional_texts[] = Label::fetchByTagname("promotional_2");
        $promotional_texts[] = Label::fetchByTagname("promotional_3");
        $welcome_text = Label::fetchByTagname("promotional_1");
        $phone = Label::fetchByTagname("phone")->caption;
        $email = Label::fetchByTagname("email")->caption;

        return view("welcome", [
            "slides" => Slide::all(),
            "photos" => $latest_photos,
            "promotional_texts" => $promotional_texts,
            "welcome_text" => $welcome_text,
            "phone" => $phone,
            "email" => $email
        ]);
    }

    public function gallery()
    {
        return view("gallery", ["photos" => Photo::all()]);
    }
}
