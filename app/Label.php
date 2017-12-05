<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public $fillable = ["caption", "description", "tagname"];

    private static $tagnames = [
        "promotional_1",
        "promotional_2",
        "promotional_3",
        "welcome",
        "phone",
        "email"
    ];

    public static function fetchByTagname($tagname)
    {
        if (!in_array($tagname, Label::$tagnames)) {
            throw new \Exception("The tagname `$tagname` does not exist.");
            return;
        }

        $label = Label::where("tagname", $tagname)->first();

        if (is_null($label)) {
            $label = Label::create([
                "caption" => "",
                "description" => "",
                "tagname" => $tagname
            ]);
        }

        return $label;
    }
}
