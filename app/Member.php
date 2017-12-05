<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function getThumbnailAttribute() {
        return config("files.thumbnail.location") . "/" . $this->image;
    }
    
    protected $fillable = ["name", "position", "image"];
}
