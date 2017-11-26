<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Label;

class PromotionController extends Controller
{
    public function index()
    {
        $promotional_texts = Label::whereIn("id", [
            config("labels.id.promotional.first"),
            config("labels.id.promotional.second"),
            config("labels.id.promotional.third")
        ])->get();

        return view("promotion.index", ["promotional_texts" => $promotional_texts]);
    }

    public function edit(Label $promotional_text)
    {
        return view("promotion.edit", ["promotional_text" => $promotional_text]);
    }

    public function update(Label $promotional_text)
    {
        $data = request()->validate([
            "caption" => "required|string",
            "description" => "required|string"
        ]);

        $promotional_text->update($data);

        return redirect()->back();
    }
}
