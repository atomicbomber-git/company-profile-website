<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class MainController extends Controller
{
    public function gallery()
    {
        return view("gallery", ["photos" => Photo::all()]);
    }
}
