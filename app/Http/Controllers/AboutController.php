<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Label;

class AboutController extends Controller
{
    public function edit()
    {
        $welcome_text = Label::fetchByTagname("welcome");

        return view("about.edit", [
            "welcome_text" => $welcome_text
        ]);
    }

    public function updateWelcome(Label $welcome_text)
    {
        $data = request()->validate([
            "caption" => "required|string",
            "description" => "required|string"
        ]);

        $welcome_text->update($data);

        return redirect()->back()->with("message_success_welcome", "Perubahan data berhasil dilakukan.");
    }
}
