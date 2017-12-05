<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Label;

class ContactController extends Controller
{
    public function edit()
    {
        return view("contact.edit", [
            "phone" => Label::fetchByTagname("phone"),
            "email" => Label::fetchByTagname("email")
        ]);
    }

    public function updatePhone()
    {
        $data = request()->validate([
            "phone" => "required|string"
        ]);

        $phone = Label::fetchByTagname("phone");
        $phone->caption = $data["phone"];
        $phone->save();

        return back()->with("message-success-phone", "Nomor telepon berhasil diubah.");
    }

    public function updateEmail()
    {
        $data = request()->validate([
            "email" => "required|email"
        ]);

        $email = Label::fetchByTagname("email");
        $email->caption = $data["email"];
        $email->save();

        return back()->with("message-success-email", "Alamat email berhasil diubah.");
    }
}
